<x-app-layout>
    <div class="p-6 max-w-2xl mx-auto">
        <h2 class="text-xl font-bold mb-4">Form Pembayaran</h2>

        <form action="{{ route('payment.store', $pengajuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nominal Cair</label>
                <input type="number" name="nominal_cair" class="border p-2 w-full" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Cair</label>
                <input type="date" name="tanggal_cair" class="border p-2 w-full" required>
            </div>

            <div class="mb-3">
                <label>Metode Pembayaran</label>
                <select name="metode" class="border p-2 w-full" required>
                    <option value="Transfer">Transfer</option>
                    <option value="Tunai">Tunai</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Bukti Transfer (Opsional)</label>
                <input type="file" name="bukti_transfer" class="border p-2 w-full">
            </div>

            <div class="mb-3">
                <label>Catatan</label>
                <textarea name="catatan" class="border p-2 w-full"></textarea>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan Pembayaran</button>
        </form>
    </div>
</x-app-layout>
