<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class KitchenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKitchen = [
            [
                'id_pasien' => '1',
                'nama' => 'John Doe',
                'konfirmasi_makanan' => 0,
            ],
            [
                'id_pasien' => '2',
                'nama' => 'Jane Smith',
                'konfirmasi_makanan' => 0,
            ],
        ];

        // Memasukkan data pasien ke dalam tabel 'pasien'
        foreach ($dataKitchen as $kitchen) {
            DB::table('kitchen')->insert($kitchen);
        }
    }
}
