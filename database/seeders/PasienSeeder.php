<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasienSeeder extends Seeder
{
    public function run()
    {
        $dataPasien = [
            [
                'no_rm' => 'RM001',
                'nama' => 'John Doe',
                'tgl_lahir' => '1990-05-15',
                'bangsal' => 'Rawat Inap Umum',
                'hasil_screening' => 'Tidak boleh makan yang berminyak',
                'tgl_periksa' => '2023-12-27',
            ],
            [
                'no_rm' => 'RM002',
                'nama' => 'Jane Smith',
                'tgl_lahir' => '1985-08-22',
                'bangsal' => 'ICU',
                'hasil_screening' => 'Tidak boleh minum es',
                'tgl_periksa' => '2023-12-28',
            ],
            [
                'no_rm' => 'RM003',
                'nama' => 'Alice Johnson',
                'tgl_lahir' => '1978-12-10',
                'bangsal' => 'Bangsal Bedah',
                'hasil_screening' => 'Tidak boleh makan yang manis',
                'tgl_periksa' => '2023-12-29',
            ],
            [
                'no_rm' => 'RM004',
                'nama' => 'Bob Williams',
                'tgl_lahir' => '1995-03-25',
                'bangsal' => 'Rawat Inap Umum',
                'hasil_screening' => 'Tidak boleh makan yang asin',
                'tgl_periksa' => '2023-12-30',
            ],
            [
                'no_rm' => 'RM005',
                'nama' => 'Eva Brown',
                'tgl_lahir' => '1980-11-05',
                'bangsal' => 'Bangsal Jantung',
                'hasil_screening' => 'Tidak boleh makan yang pedas',
                'tgl_periksa' => '2023-12-31',
            ],
        ];

        // Memasukkan data pasien ke dalam tabel 'pasien'
        foreach ($dataPasien as $pasien) {
            DB::table('pasien')->insert($pasien);
        }
    }
}
