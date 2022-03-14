<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        return [
            'brand_name' => $this->faker->streetName(random_int(0, 99)),

            'brand_slug' =>  $slug,
            'brand_image' => 'brand-sample.png',
            'brand_description' => $this->faker->realText(60),
        ];
    }
}
