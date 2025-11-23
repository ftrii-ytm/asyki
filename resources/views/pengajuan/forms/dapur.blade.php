{{-- resources/views/pengajuan/form/dapur.blade.php --}}
@extends('layouts.app')

@section('content')
<h2>Form Pengajuan Belanja Dapur</h2>

<form action="{{ route('pengajuan.store') }}" method="POST">
    @csrf
    <input type="hidden" name="jenis" value="dapur">

    <label>No:</label>
    <input type="text" name="no" required><br><br>

    <label>Nama Barang:</label>
    <input type="text" name="nama_barang"><br><br>

    <label>Stok Tersedia:</label>
    <input type="number" name="stok"><br><br>

    <label>Qty Pengajuan:</label>
    <input type="number" name="qty"><br><br>

    <label>Estimasi Harga:</label>
    <input type="number" name="estimasi"><br><br>

    <label>Jumlah:</label>
    <input type="number" name="jumlah"><br><br>

    <label>Keterangan:</label>
    <textarea name="keterangan"></textarea><br><br>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
