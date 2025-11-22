<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Notifications\PengajuanApprovedNotification;
use Illuminate\Support\Facades\Notification;

class GAController extends Controller
{
    public function index()
    {
        // STATUS YANG BENAR SESUAI DATABASE: "menunggu_ga"
        $pengajuans = Pengajuan::where('status', 'menunggu_ga')->get();

        return view('ga.index', compact('pengajuans'));
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // STATUS BARU
        $pengajuan->status = 'disetujui_ga';
        $pengajuan->save();

        // KIRIM EMAIL KE USER
        if ($pengajuan->user && $pengajuan->user->email) {
            Notification::route('mail', $pengajuan->user->email)
                ->notify(new PengajuanApprovedNotification($pengajuan));
        }

        return redirect()->route('ga.index')
            ->with('success', 'Pengajuan berhasil disetujui dan notifikasi dikirim.');
    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);

        // STATUS BARU
        $pengajuan->status = 'ditolak_ga';
        $pengajuan->save();

        return redirect()->route('ga.index')
            ->with('error', 'Pengajuan ditolak.');
    }
}
