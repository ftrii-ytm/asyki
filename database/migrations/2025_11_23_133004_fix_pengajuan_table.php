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
    Schema::table('pengajuans', function (Blueprint $table) {
        if (Schema::hasColumn('pengajuans', 'nama_pengaju')) {
            $table->dropColumn('nama_pengaju');
        }
        if (Schema::hasColumn('pengajuans', 'keterangan')) {
            $table->dropColumn('keterangan');
        }
        if (Schema::hasColumn('pengajuans', 'total')) {
            $table->dropColumn('total');
        }
    });
}

public function down(): void
{
    Schema::table('pengajuans', function (Blueprint $table) {
        $table->string('nama_pengaju')->nullable();
        $table->text('keterangan')->nullable();
        $table->decimal('total', 15, 2)->nullable();
    });
}

};
