<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-4">Daftar Pengajuan Disetujui</h2>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Judul</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuans as $p)
                <tr>
                    <td class="p-2 border">{{ $p->judul_pengajuan }}</td>
                    <td class="p-2 border">Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                    <td class="p-2 border text-center">
                        <a href="{{ route('payment.create', $p->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded">Bayar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
