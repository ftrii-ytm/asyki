<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-4">Halaman Keuangan</h1>

        <table class="w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2 text-left">Nama Pengaju</th>
                    <th class="border p-2 text-left">Judul Pengajuan</th>
                    <th class="border p-2 text-left">Jumlah Barang</th>
                    <th class="border p-2 text-left">Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($pengajuans as $p)
                    <tr>
                        <td class="border p-2">{{ $p->user->name ?? '-' }}</td>
                        <td class="border p-2">{{ $p->judul_pengajuan }}</td>
                        <td class="border p-2">{{ $p->jumlah }}</td>
                        <td class="border p-2">{{ $p->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-4 text-center text-gray-500">
                            Belum ada data pengajuan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>
