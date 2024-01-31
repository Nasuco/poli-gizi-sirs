<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gizi extends Model
{
    use HasFactory;

    protected $table = 'gizi';

    protected $fillable = [
        'pola_makan',
        'kebiasaan_minum',
        'makanan_selingan',
        'diit_smrs',
        'btm',
        'suplemen',
        'aktivitas_fisik',
        'konseling_gizi',
        'id_pasien',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function screening()
    {
        return $this->hasOne(Screening::class, 'id_gizi', 'id');
    }
}
