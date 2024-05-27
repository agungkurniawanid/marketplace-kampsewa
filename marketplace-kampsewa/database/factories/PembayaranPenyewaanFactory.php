<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembayaranPenyewaan>
 */
class PembayaranPenyewaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_penyewaan'=>$this->faker->numberBetween(1,200),
            'bukti_pembayaran'=>$this->faker->imageUrl(),
            'jumlah_pembayaran'=>$this->faker->numberBetween(10000,100000),
            'kembalian_pembayaran'=>$this->faker->numberBetween(0, 100000),
            'total_pembayaran'=>$this->faker->numberBetween(10000,100000),
            'metode'=>$this->faker->randomElement(['transfer', 'bayar_ditempat']),
            'status_pembayaran'=>$this->faker->randomElement(['lunas', 'belum lunas']),
            'created_at'=>$this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
