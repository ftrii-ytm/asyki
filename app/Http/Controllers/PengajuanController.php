<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;

class PengajuanController extends Controller
{
    // Halaman utama daftar pengajuan
    public function index()
    {
        $pengajuans = Pengajuan::orderBy('created_at', 'desc')->get();
        return view('pengajuan.index', compact('pengajuans'));
    }

    // Load form sesuai jenis pengajuan
    public function loadForm($jenis)
    {
        $allowed = ['asset','dapur','atk','keamanan','keperawatan','kolam','pantry','poac','toren'];

        if(!in_array($jenis, $allowed)){
            abort(404);
        }

        // File harus ada di resources/views/pengajuan/form/{jenis}.blade.php
        return view('pengajuan.form.' . $jenis);
    }

    // Simpan pengajuan baru
    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'judul_pengajuan' => 'required|string|max:255',
            'nominal' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $pengajuan = new Pengajuan();
        $pengajuan->jenis = $request->jenis;
        $pengajuan->judul_pengajuan = $request->judul_pengajuan;
        $pengajuan->nominal = $request->nominal;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->user_id = auth()->id(); // pastikan pakai auth
        $pengajuan->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil disimpan!');
    }

    // Form edit pengajuan
    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.edit', compact('pengajuan'));
    }

    // Update pengajuan
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_pengajuan' => 'required|string|max:255',
            'nominal' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->judul_pengajuan = $request->judul_pengajuan;
        $pengajuan->nominal = $request->nominal;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diupdate!');
    }

    // Hapus pengajuan
    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dihapus!');
    }

    // Kirim pengajuan (misal ke GA)
    public function kirim($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = 'dikirim';
        $pengajuan->save();

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
    }
}
