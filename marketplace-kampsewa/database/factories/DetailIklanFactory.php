<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetailIklan>
 */
class DetailIklanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_iklan' => $this->faker->numberBetween(1, 10),
            'tanggal_mulai' => '2024-05-19',
            'tanggal_akhir' => '2024-05-21',
            'harga_iklan' => $this->faker->numberBetween(10000, 100000),
            'status_iklan' => 'Aktif',
        ];
    }
}
