<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class KeuanganController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::whereIn('status', ['disetujui_ga', 'menunggu_keuangan', 'disetujui_keuangan', 'ditolak_keuangan'])->get();
        return view('keuangan.index', compact('pengajuans'));
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update(['status' => 'disetujui_keuangan']);
        return back()->with('success', 'Pengajuan disetujui keuangan!');
    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update(['status' => 'ditolak_keuangan']);
        return back()->with('success', 'Pengajuan ditolak keuangan!');
    }
}
