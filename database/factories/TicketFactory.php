<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->text(20),
            'content' => $this->faker->text(),
            'user_name' => $this->faker->name(),
            'user_email' => $this->faker->unique()->safeEmail(),
            'status' => false,
        ];
    }
}
