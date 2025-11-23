@extends('layouts.app')

@section('content')
<h2>Form Pengajuan ATK</h2>
<form action="{{ route('pengajuan.store') }}" method="POST">
    @csrf
    <input type="hidden" name="jenis" value="atk">

    <label>Nama Barang:</label>
    <input type="text" name="nama_barang" required><br><br>

    <label>Qty:</label>
    <input type="number" name="qty"><br><br>

    <label>Biaya:</label>
    <input type="number" name="biaya"><br><br>

    <label>Keterangan:</label>
    <textarea name="keterangan"></textarea><br><br>

    <button type="submit">Simpan Pengajuan</button>
</form>
@endsection
