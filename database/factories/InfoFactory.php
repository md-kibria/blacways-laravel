<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Info>
 */
class InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Site Title',
            'logo' => '',
            'favicon' => '',
            'description' => '',
            'email' => 'test@test.com',
            'phone' => '+88 01234 56789',
            'address' => 'Milky Way, Galaxy',
        ];
    }
}
