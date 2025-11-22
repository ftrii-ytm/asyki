<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'pengajuan_id', 'nominal_cair', 'tanggal_cair', 'metode', 'bukti_transfer', 'catatan'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    public function payment()
{
    return $this->hasOne(Payment::class);
}

}

