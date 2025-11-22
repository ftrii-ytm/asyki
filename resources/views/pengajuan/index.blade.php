<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Pengajuan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <a href="{{ route('pengajuan.create') }}"
                   class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Tambah Pengajuan
                </a>

                <table class="w-full border mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border p-2">Judul</th>
                            <th class="border p-2">Jumlah</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pengajuans as $p)
                            <tr>
                                <td class="border p-2">{{ $p->judul_pengajuan }}</td>
                                <td class="border p-2">{{ $p->jumlah }}</td>
                                <td class="border p-2">{{ $p->status }}</td>

                                <td class="border p-2 space-x-2">

                                    {{-- EDIT --}}
                                    <a href="{{ route('pengajuan.edit', $p->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('pengajuan.destroy', $p->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                            onclick="return confirm('Hapus pengajuan ini?')">
                                            Hapus
                                        </button>
                                    </form>

                                    {{-- KIRIM KE GA --}}
                                    @if ($p->status == 'draft')
                                        <form action="{{ route('pengajuan.kirim', $p->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                                Kirim ke GA
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</x-app-layout>
