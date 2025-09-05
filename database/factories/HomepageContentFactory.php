<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomepageContent>
 */
class HomepageContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          return [
            'section' => $this->faker->unique()->word(),
            'title' => null,
            'sub_title' => null,
            'image' => null,
            'image_helper' => null,
            'url' => null,
        ];
    }
}
