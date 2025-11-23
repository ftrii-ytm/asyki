@extends('layouts.app')

@section('content')

<style>
    .sidebar {
        width: 260px;
        background: #fff;
        border-right: 1px solid #ddd;
        height: calc(100vh - 64px);
        padding-top: 10px;
        position: fixed;
        top: 64px;
        left: 0;
        overflow-y: auto;
    }

    .menu-item {
        cursor: pointer;
        padding: 12px 18px;
        border-left: 4px solid transparent;
        transition: .15s;
    }

    .menu-item:hover {
        background: #f1f5f9;
    }

    .menu-item.active {
        background: #e0e7ff;
        border-left: 4px solid #3b82f6;
        font-weight: 600;
    }

    .form-container {
        margin-left: 260px;
        padding: 30px;
        min-height: calc(100vh - 64px);
        background: #f8fafc;
    }
</style>

<div class="sidebar">
    <h5 class="px-3 mb-2 ">Pengajuan</h5>

    <ul class="list-group list-group-flush">
        <li class="list-group-item menu-item" data-form="asset">Asset Tetap Pisah</li>
        <li class="list-group-item menu-item" data-form="dapur">Belanja Dapur</li>
        <li class="list-group-item menu-item" data-form="poac">PO AC</li>
        <li class="list-group-item menu-item" data-form="pantry">Stock Pantry</li>
        <li class="list-group-item menu-item" data-form="atk">Pembelanjaan ATK</li>
        <li class="list-group-item menu-item" data-form="jnt">Laporan JNT</li>
        <li class="list-group-item menu-item" data-form="keperawatan">Keperawatan</li>
        <li class="list-group-item menu-item" data-form="keamanan">Keamanan</li>
        <li class="list-group-item menu-item" data-form="kebersihan">Kebersihan</li>
        <li class="list-group-item menu-item" data-form="toren">Kebersihan Toren Air</li>
        <li class="list-group-item menu-item" data-form="kolam">Kebersihan Kolam Ikan</li>
    </ul>
</div>

<div id="formContainer" class="form-container">
    <h4 class="text-muted text-center">Silakan pilih jenis pengajuan di sebelah kiri.</h4>
</div>

<script>
    document.querySelectorAll(".menu-item").forEach(item => {
        item.addEventListener("click", function () {

            document.querySelectorAll(".menu-item").forEach(i => i.classList.remove("active"));
            this.classList.add("active");

            const form = this.dataset.form;

            fetch(`/pengajuan/form/${form}`)
                .then(res => res.text())
                .then(html => {
                    document.getElementById("formContainer").innerHTML = html;
                });
        });
    });
</script>

@endsection
