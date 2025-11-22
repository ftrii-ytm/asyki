<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Pengajuan; // ✅ penting

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // 🔹 Relasi ke tabel pengajuans
    public function pengajuans()
    {
        return $this->hasMany(Pengajuan::class, 'user_id');
    }
}
