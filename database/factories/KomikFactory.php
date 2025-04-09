<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Komik>
 */
class KomikFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(),
            'genre' => $this->faker->randomElement(['Aksi', 'Fantasi', 'Drama', 'Petualangan']),
            'pengarang' => $this->faker->name(),
            'tanggal_publikasi' => $this->faker->date(),
        ];
    }
}
