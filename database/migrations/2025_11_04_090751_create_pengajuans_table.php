<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('judul_pengajuan');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['menunggu', 'ditolak', 'disetujui'])->default('menunggu');
            $table->text('alasan_tolak')->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->text('catatan')->nullable(); // tambahkan ini biar kolom catatan ada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
