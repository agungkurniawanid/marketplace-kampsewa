<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailPenyewaan>
 */
class DetailPenyewaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_penyewaan'=>$this->faker->numberBetween(1, 200),
            'id_produk'=>$this->faker->numberBetween(1,200),
            'id_variant_produk'=>$this->faker->numberBetween(1,200),
            'qty'=>$this->faker->numberBetween(1,200),
            'subtotal'=>$this->faker->numberBetween(10000,100000),
            'pesan'=>$this->faker->sentence(),
            'biaya_admin'=>$this->faker->numberBetween(10000, 100000),
            'jenis_transaksi'=>$this->faker->randomElement(['ambil ditempat', 'antar ditempat']),
            'created_at'=>$this->faker->dateTimeBetween('-1 year','now'),
        ];
    }
}
