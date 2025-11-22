<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buat Pengajuan Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('pengajuan.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Judul Pengajuan</label>
                        <input type="text" name="judul_pengajuan" class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Nominal</label>
                        <input type="number" name="nominal" class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-gray-700">Catatan (opsional)</label>
                        <textarea name="catatan" class="w-full border-gray-300 rounded mt-1"></textarea>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                        <a href="{{ route('pengajuan.index') }}" class="ml-2 text-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
