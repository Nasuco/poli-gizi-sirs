<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisik extends Model
{
    use HasFactory;

    protected $table = 'fisik';

    protected $fillable = [
        'klinis',
        'gangguan_gastrointestinal',
        'tekanan_darah',
        'respirasi',
        'nadi',
        'suhu',
        'id_pasien',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function screening()
    {
        return $this->hasOne(Screening::class, 'id_fisik', 'id_fisik');
    }
}
