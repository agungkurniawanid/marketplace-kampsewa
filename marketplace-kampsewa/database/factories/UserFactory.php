<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'type' => $this->faker->numberBetween(0, 1),
            'nomor_telephone' => $this->faker->phoneNumber(),
            'tanggal_lahir' => $this->faker->date(),
            'alamat' => json_encode([
                'alamat_1' => $this->faker->address(),
                'alamat_2' => $this->faker->address(),
                'alamat_3' => $this->faker->address(),
            ]),
            'foto' => 'man.png',
            'status' => 'offline',
            'background' => $this->faker->sentence(),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'time_login' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
