<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_user' => $this->faker->numberBetween(1, 200),
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['Tersedia', 'Tidak Tersedia']),
            'kategori' => $this->faker->randomElement(['Tenda', 'Pakaian', 'Tas', 'Sepatu', 'Perlengkapan']),
            'variants' => json_encode([
                [
                    'warna' => 'Merah',
                    'ukuran' => [
                        ['ukuran' => 'S', 'stok' => 15, 'harga_sewa' => 10000],
                        ['ukuran' => 'M', 'stok' => 10, 'harga_sewa' => 12000],
                        ['ukuran' => 'L', 'stok' => 5, 'harga_sewa' => 15000]
                    ]
                ],
                [
                    'warna' => 'Biru',
                    'ukuran' => [
                        ['ukuran' => 'S', 'stok' => 12, 'harga_sewa' => 11000],
                        ['ukuran' => 'M', 'stok' => 8, 'harga_sewa' => 13000],
                        ['ukuran' => 'L', 'stok' => 4, 'harga_sewa' => 16000],
                        ['ukuran' => 'XL', 'stok' => 2, 'harga_sewa' => 18000]
                    ]
                ],
                [
                    'warna' => 'Hijau',
                    'ukuran' => [
                        ['ukuran' => 'S', 'stok' => 18, 'harga_sewa' => 9000],
                        ['ukuran' => 'M', 'stok' => 14, 'harga_sewa' => 11500],
                        ['ukuran' => 'L', 'stok' => 7, 'harga_sewa' => 14000],
                        ['ukuran' => 'XL', 'stok' => 3, 'harga_sewa' => 17000],
                        ['ukuran' => 'XXL', 'stok' => 1, 'harga_sewa' => 19000]
                    ]
                ],
                [
                    'warna' => 'Kuning',
                    'ukuran' => [
                        ['ukuran' => 'S', 'stok' => 10, 'harga_sewa' => 9500],
                        ['ukuran' => 'M', 'stok' => 9, 'harga_sewa' => 12500],
                        ['ukuran' => 'L', 'stok' => 3, 'harga_sewa' => 15000]
                    ]
                ],
                [
                    'warna' => 'Hitam',
                    'ukuran' => [
                        ['ukuran' => 'S', 'stok' => 20, 'harga_sewa' => 10500],
                        ['ukuran' => 'M', 'stok' => 15, 'harga_sewa' => 13500],
                        ['ukuran' => 'L', 'stok' => 5, 'harga_sewa' => 17000],
                        ['ukuran' => 'XL', 'stok' => 2, 'harga_sewa' => 20000]
                    ]
                ],
                [
                    'warna' => 'Putih',
                    'ukuran' => [
                        ['ukuran' => 'S', 'stok' => 25, 'harga_sewa' => 11500],
                        ['ukuran' => 'M', 'stok' => 18, 'harga_sewa' => 14500],
                        ['ukuran' => 'L', 'stok' => 8, 'harga_sewa' => 18000],
                        ['ukuran' => 'XL', 'stok' => 5, 'harga_sewa' => 21000]
                    ]
                ],
                [
                    'warna' => 'Ungu',
                    'ukuran' => [
                        ['ukuran' => 'S', 'stok' => 17, 'harga_sewa' => 9500],
                        ['ukuran' => 'M', 'stok' => 13, 'harga_sewa' => 12500],
                        ['ukuran' => 'L', 'stok' => 6, 'harga_sewa' => 15500],
                        ['ukuran' => 'XL', 'stok' => 3, 'harga_sewa' => 18500]
                    ]
                ]
            ]),
            'foto_depan' => $this->faker->imageUrl(),
            'foto_belakang' => $this->faker->imageUrl(),
            'foto_kiri' => $this->faker->imageUrl(),
            'foto_kanan' => $this->faker->imageUrl(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
