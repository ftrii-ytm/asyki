@extends('layouts.app')

@section('content')
<h2>Form Pengajuan Asset</h2>
<form action="{{ route('pengajuan.store') }}" method="POST">
    @csrf
    <input type="hidden" name="jenis" value="asset">

    <label>Judul Pengajuan:</label>
    <input type="text" name="judul_pengajuan" required><br><br>

    <label>Nominal:</label>
    <input type="number" name="nominal" step="0.01"><br><br>

    <label>Keterangan:</label>
    <textarea name="keterangan"></textarea><br><br>

    <button type="submit">Simpan Pengajuan</button>
</form>
@endsection
