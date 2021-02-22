<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id' => User::factory(), // necessary for relationship to Users table. will create new fake users. 
          // Note need to include use App\Models\User (line 6)
          'title' =>$this->faker->sentence,
          'body' =>$this->faker->paragraph(2),
          'excerpt' =>$this->faker->paragraph,
        ];
    }
}
