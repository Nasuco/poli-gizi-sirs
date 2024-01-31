<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kitchen;


class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    protected $fillable = [
        'no_rm',
        'nama',
        'tgl_lahir',
        'bangsal',
        'hasil_screening',
        'tgl_periksa'
    ];
    
    public static function paginateData($perPage)
    {
        return static::paginate($perPage);
    }

    public function kitchen()
    {
        return $this->hasOne(Kitchen::class, 'id_pasien', 'id');
    }

    public function screening()
    {
        return $this->hasMany(Screening::class, 'id_pasien', 'id');
    }

    public function gizi()
    {
        return $this->hasOne(Gizi::class, 'id_pasien', 'id');
    }

    public function fisik()
    {
        return $this->hasOne(Fisik::class, 'id_pasien', 'id');
    }

    public function biokimia()
    {
        return $this->hasOne(Biokimia::class, 'id_pasien', 'id');
    }

    public function antropometri()
    {
        return $this->hasMany(Antropometri::class, 'id_pasien', 'id');
    }

}
