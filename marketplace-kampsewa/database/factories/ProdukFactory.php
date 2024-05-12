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
            'id_user' => $this->faker->numberBetween(1, 10),
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'harga' => $this->faker->numberBetween(10000, 100000),
            'stok' => $this->faker->numberBetween(10, 100),
            'status' => $this->faker->randomElement(['Tersedia', 'Tidak Tersedia']),
            'kategori' => $this->faker->randomElement(['Outdoor', 'Furniture', 'Elektronik']),
            'variants' => json_encode([
                [
                    'warna' => $this->faker->colorName,
                    'ukuran' => $this->faker->randomElement(['S', 'M', 'L']),
                    'stok' => $this->faker->numberBetween(5, 20)
                ],
                [
                    'warna' => $this->faker->colorName,
                    'ukuran' => $this->faker->randomElement(['S', 'M', 'L']),
                    'stok' => $this->faker->numberBetween(5, 20)
                ],
                [
                    'warna' => $this->faker->colorName,
                    'ukuran' => $this->faker->randomElement(['S', 'M', 'L']),
                    'stok' => $this->faker->numberBetween(5, 20)
                ]
            ]),
            'foto_depan' => $this->faker->imageUrl(),
            'foto_belakang' => $this->faker->imageUrl(),
            'foto_kiri' => $this->faker->imageUrl(),
            'foto_kanan' => $this->faker->imageUrl(),
        ];
    }
}
