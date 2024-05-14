<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Achmad Bayhaqi Putra',
            'email' => 'admin@kampsewa',
            'password' => bcrypt('admin'),
            'type' => 1,
            'nomor_telephone' => '089620109794',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => 'Jl. Admin',
            'foto' => 'admin.png',
            'status' => 'aktif',
            'background' => 'admin.png',
            'jenis_kelamin' => 'Laki-laki',
            'remember_token' => Str::random(60),
            'created_at' => now(),
        ]);

        for($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => 'User '.$i,
                'email' => 'user'.$i.'@kampsewa',
                'password' => bcrypt('user'),
                'type' => 0,
                'nomor_telephone' => '081234567890',
                'tanggal_lahir' => '2000-01-01',
                'alamat' => 'Jl. User '.$i,
                'foto' => 'user.png',
                'status' => 'aktif',
                'background' => 'user.png',
                'jenis_kelamin' => 'Laki-laki',
                'remember_token' => Str::random(60),
                'created_at' => now(),
            ]);
        }
    }
}
