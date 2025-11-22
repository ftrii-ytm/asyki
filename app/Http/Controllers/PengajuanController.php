<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
  public function index()
{
    $pengajuans = Pengajuan::where('user_id', auth()->id())->get();

    return view('pengajuan.index', compact('pengajuans'));
}


    public function create()
    {
        return view('pengajuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_pengajuan' => 'required',
            'nominal' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);

        Pengajuan::create([
            'user_id' => Auth::id(),
            'judul_pengajuan' => $request->judul_pengajuan,
            'nominal' => $request->nominal,
            'catatan' => $request->catatan,
            'status' => 'menunggu_ga',
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dibuat!');
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        return view('pengajuan.edit', compact('pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update($request->only(['judul_pengajuan', 'nominal', 'catatan']));

        return redirect()->route('pengajuan.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Pengajuan::findOrFail($id)->delete();
        return redirect()->route('pengajuan.index')->with('success', 'Data berhasil dihapus!');
    }

    public function kirim($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update(['status' => 'menunggu_ga']);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan dikirim ke GA!');
    }
}
