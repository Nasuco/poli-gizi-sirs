<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antropometri extends Model
{
    use HasFactory;

    protected $table = 'antropometri';

    protected $fillable = [
        'berat_badan',
        'tinggi_badan',
        'lila',
        'imt',
        'tinggilutut',
        'id_pasien',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function screening()
    {
        return $this->hasOne(Screening::class, 'id_antropometri', 'id_antropometri');
    }
}
