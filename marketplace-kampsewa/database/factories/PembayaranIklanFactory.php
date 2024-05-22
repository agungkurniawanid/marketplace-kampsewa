<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PembayaranIklan>
 */
class PembayaranIklanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_iklan' => 1,
            'id_user' => 1,
            'metode_bayar' => 'Transfer',
            'total_bayar' => $this->faker->numberBetween(100000, 1000000),
            'status_bayar' => 'Lunas',
        ];
    }
}
