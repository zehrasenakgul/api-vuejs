<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "amount" => $this->faker->numberBetween(200, 9000),
            "spending" => $this->faker->word(),
            "date" => $this->faker->dateTimeBetween('-5 years',  'now'),
            'category_id' => $this->faker->randomElement(Category::pluck('id')),
        ];
    }
}
