<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AhliGizi extends Model
{
    use HasFactory;

    protected $table = 'ahli_gizi';

    protected $fillable = [
        'nama',
        'email',
        'alamat',
    ];

    public function screening()
    {
        return $this->hasMany(Screening::class);
    }

    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
