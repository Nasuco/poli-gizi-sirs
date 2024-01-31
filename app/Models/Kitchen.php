<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    use HasFactory;

    protected $table = 'kitchen';

    protected $fillable = [
        'kode_makanan',
        'konfirmasi_makanan',
        'keterangan',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function screening()
    {
        return $this->hasOne(Screening::class, 'kitchen_id', 'kitchen_id');
    }
}
