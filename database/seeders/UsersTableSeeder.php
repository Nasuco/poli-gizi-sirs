<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Ahli Gizi',
            'email' => 'ahligizi@sirs.com',
            'email_verified_at' => now(),
            'password' => Hash::make('ahligizi'),
            'type' => 1, // ahligizi
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Kitchen',
            'email' => 'kitchen@sirs.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kitchenn'),
            'type' => 2, // kitchen
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Distributor',
            'email' => 'distributor@sirs.com',
            'email_verified_at' => now(),
            'password' => Hash::make('distributor'),
            'type' => 3, // distributor
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
