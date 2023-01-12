<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class cvsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'location' => $this->faker->randomElement(['Rotterdam', 'Amsterdam', 'Groningen', 'Almere', 'Utrecht']),
            'education' => $this->faker->randomElement(['Universitair', 'HBO', 'MBO', 'VMBO', 'HAVO', 'VWO']),
            'drivers_license' => $this->faker->randomElements(['Motor (A)', 'Auto (B)', 'Vrachtauto (C)', 'Bus (D)', 'Landbouwvoertuig (T)'], $this->faker->numberBetween(1, 3)),
            'languages' => $this->faker->randomElements(['Nederlands', 'Engels', 'Duits', 'Frans', 'Spaans', 'Italiaans'], $this->faker->numberBetween(1, 6)),
            'years_experience' => $this->faker->numberBetween(0, 30),
            'preferred_hours' => $this->faker->numberBetween(10, 40),
            'preferred_contract' => $this->faker->randomElement(['Vast contract', 'Stage', 'Tijdelijk contract', 'Freelance', 'Detachering']),
            'preferred_max_distance' => $this->faker->numberBetween(12, 50),
            'preferred_function' => $this->faker->randomElement(['ICT', 'Marketing', 'HR', 'Recruitment', 'Logistiek']),
        ];
    }
}
