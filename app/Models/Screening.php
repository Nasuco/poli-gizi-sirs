<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Screening extends Model
{
    use HasFactory;

    protected $table = 'screening';

    protected $fillable = [
        'jam_screening',
        'tgl_screening',
        'id_ahligizi',
        'rencana_monitoring',
        'id_pasien',
        'diagnosis_medis',
        'risiko',
        'difabel',
        'alergi_makanan',
        'preskripsi_diet',
        'tindak_lanjut',
        'id_antropometri',
        'id_biokimia',
        'id_fisik',
        'id_gizi',
        'riwayat_gizi',
        'riwayat_personal',
        'diagnosis_gizi',
        'intervensi_gizi',
    ];

    public $timestamps = true;

    protected $primaryKey = 'id_screening';

    public function setCreatedAtAttribute($value)
    {
        $this->attributes['created_at'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->setTimezone('Asia/Jakarta');
    }

    public function setUpdatedAtAttribute($value)
    {
        $this->attributes['updated_at'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->setTimezone('Asia/Jakarta');
    }

    public function ahligizi()
    {
        return $this->belongsTo(AhliGizi::class, 'id_ahligizi', 'id_ahligizi');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id');
    }

    public function antropometri()
    {
        return $this->belongsTo(Antropometri::class, 'id_antropometri', 'id');
    }

    public function biokimia()
    {
        return $this->belongsTo(Biokimia::class, 'id_biokimia', 'id');
    }

    public function fisik()
    {
        return $this->belongsTo(Fisik::class, 'id_fisik', 'id');
    }

    public function gizi()
    {
        return $this->belongsTo(Gizi::class, 'id_gizi', 'id');
    }
}
