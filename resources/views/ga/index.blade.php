<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Daftar Pengajuan (GA)</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mb-2">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-2">
                {{ session('error') }}
            </div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Judul</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pengajuans as $p)
                <tr>
                    <td class="border p-2">{{ $p->judul_pengajuan }}</td>
                    <td class="border p-2">{{ $p->status }}</td>
                    <td class="border p-2 space-x-2">

                        <form action="{{ route('ga.approve', $p->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                Setujui
                            </button>
                        </form>

                        <form action="{{ route('ga.reject', $p->id) }}" method="POST" class="inline">
                            @csrf
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                Tolak
                            </button>
                        </form>

                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3" class="border p-4 text-center text-gray-500">
                            Tidak ada pengajuan menunggu GA.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
