<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Dari form
            $table->string('judul_pengajuan');
           $table->decimal('total', 15, 2)->nullable();
$table->decimal('nominal', 15, 2)->nullable(); 
$table->text('catatan')->nullable();

            $table->text('catatan')->nullable();

            // STATUS
            $table->enum('status', [
                'menunggu_ga',
                'ditolak_ga',
                'disetujui_ga',
                'menunggu_keuangan',
                'ditolak_keuangan',
                'disetujui_keuangan'
            ])->default('menunggu_ga');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
