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
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pengajuan_id')->constrained()->onDelete('cascade');
        $table->decimal('nominal_cair', 15, 2);
        $table->date('tanggal_cair');
        $table->string('metode')->nullable(); // Transfer / Tunai / Giro dll
        $table->string('bukti_transfer')->nullable();
        $table->text('catatan')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
