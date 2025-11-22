<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pengajuan
        </h2>
    </x-slot>

    <div class="container mx-auto mt-6 bg-white p-6 rounded shadow">
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-4">
                <label class="block font-medium">Kebutuhan</label>
                <input type="text" name="judul_pengajuan" value="{{ $pengajuan->judul_pengajuan }}"
                       class="w-full border rounded mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Jumlah (Rp)</label>
                <input type="number" name="nominal" value="{{ $pengajuan->nominal }}"
                       class="w-full border rounded mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Keterangan</label>
                <textarea name="catatan" class="w-full border rounded mt-1">{{ $pengajuan->catatan }}</textarea>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Perbarui</button>
            <a href="{{ route('pengajuan.index') }}" class="text-gray-600 ml-2">Batal</a>
        </form>
    </div>
</x-app-layout>
