<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::where('status', 'disetujui')->get();
        return view('payment.index', compact('pengajuans'));
    }

    public function create($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('payment.create', compact('pengajuan'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nominal_cair' => 'required|numeric|min:0',
            'tanggal_cair' => 'required|date',
            'metode' => 'required|string',
            'bukti_transfer' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'catatan' => 'nullable|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);

        $data = $request->only(['nominal_cair', 'tanggal_cair', 'metode', 'catatan']);

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $path = $file->store('bukti_transfer', 'public');
            $data['bukti_transfer'] = $path;
        }

        $payment = Payment::create(array_merge(['pengajuan_id' => $pengajuan->id], $data));

        $pengajuan->update(['status' => 'selesai_dibayar']);

        // kirim notifikasi ke pengaju dan GA
        $pengajuan->user->notify(new \App\Notifications\PengajuanStatusNotification($pengajuan));

        return redirect()->route('payment.index')->with('success', 'Pembayaran berhasil disimpan.');
    }
}
