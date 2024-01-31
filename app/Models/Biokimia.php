<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biokimia extends Model
{
    use HasFactory;

    protected $table = 'biokimia';

    protected $fillable = [
        'hb',
        'gds',
        'kolesterol',
        'trigliserit',
        'sgot',
        'sgpt',
        'albumin',
        'ureum',
        'kreatinin',
        'id_pasien',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function screening()
    {
        return $this->hasOne(Screening::class, 'id_biokimia', 'id_biokimia');
    }
}
