<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> User::factory(),
            'title' => $this->faker->sentence(),
            'company' => $this->faker->unique()->company(),
            'email'=>$this->faker->unique()->companyEmail(),
            'location'=>$this->faker->city(),
            'website'=>$this->faker->url(),
            'tags'=>'html,css,boostrap',
            'description'=>$this->faker->paragraph(5),
        ];
    }
}
