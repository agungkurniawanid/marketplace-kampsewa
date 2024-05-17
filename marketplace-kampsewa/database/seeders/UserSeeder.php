<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
            'name' => 'Agung Kurniawan',
            'email' => 'admin@kampsewa',
            'password' => bcrypt('admin'),
            'type' => 1,
            'nomor_telephone' => '089620109794',
            'tanggal_lahir' => '2000-01-01',
            'alamat' => json_encode([
                [
                    'alamat_1' => 'Jl. Agung Kurniawan',
                ],
                [
                    'alamat_2' => 'Jl. Agung Kurniawan',
                ]
            ]),
            'foto' => 'agung-kurniawan.jpg',
            'status' => 'offline',
            'background' => 'admin.png',
            'jenis_kelamin' => 'Laki-laki',
            'remember_token' => Str::random(60),
            'created_at' => now(),
        ]);

        for ($i = 1; $i <= 50; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@kampsewa',
                'password' => bcrypt('user'),
                'type' => 0,
                'nomor_telephone' => '081234567890',
                'tanggal_lahir' => '2000-01-01',
                'alamat' => json_encode([
                    [
                        'alamat_1' => 'Jl. User ' . $i,
                    ],
                    [
                        'alamat_2' => 'Jl. User ' . $i,
                    ]
                ]),
                'foto' => 'user.png',
                'status' => 'offline',
                'background' => 'user.png',
                'jenis_kelamin' => 'Laki-laki',
                'remember_token' => Str::random(60),
                'created_at' => now(),
            ]);
        }

        $previousMonth = Carbon::now()->subMonth();

        for ($i = 11; $i <= 90; $i++) {
            $userNumber = $i + 10;
            $email = 'user' . $userNumber . '@kampsewa';
            $existingUser = User::where('email', $email)->exists();

            if (!$existingUser) {
                DB::table('users')->insert([
                    'name' => 'User ' . $userNumber,
                    'email' => $email,
                    'password' => bcrypt('user'),
                    'type' => 0,
                    'nomor_telephone' => '081234567890',
                    'tanggal_lahir' => '2000-01-01',
                    'alamat' => json_encode([
                        [
                            'alamat_1' => 'Jl. User ' . $userNumber,
                        ],
                        [
                            'alamat_2' => 'Jl. User ' . $userNumber,
                        ]
                    ]),
                    'foto' => 'user.png',
                    'status' => 'offline',
                    'background' => 'user.png',
                    'jenis_kelamin' => 'Laki-laki',
                    'remember_token' => Str::random(60),
                    'created_at' => $previousMonth,
                ]);
            }
        }
    }
}
