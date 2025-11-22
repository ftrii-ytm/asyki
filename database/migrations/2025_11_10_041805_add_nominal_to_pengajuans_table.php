<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            if (!Schema::hasColumn('pengajuans', 'nominal')) {
                $table->decimal('nominal', 15, 2)->default(0)->after('judul_pengajuan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->dropColumn('nominal');
        });
    }
};
