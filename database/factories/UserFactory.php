<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'uuid' => Str::uuid()->toString(),
            'email' => $this->faker->unique()->safeEmail(),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'phone_number' => $this->faker->phoneNumber(),
            'country' => $this->faker->country(),
            'county' => $this->faker->state(),
            'on_whatsapp' => $this->faker->boolean(),
            'age' => $this->faker->numberBetween(18, 60),
            'church' => $this->faker->company(),
            'in_cr_group' => $this->faker->boolean(),
            'cr_group_name' => $this->faker->word(),
            'diet' => $this->faker->word(),
            'interested_in_starting_cr_group' => $this->faker->boolean(),
            'willing_to_sponsor' => $this->faker->boolean(),
            'password' => Hash::make('password'), // or bcrypt('password')
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
