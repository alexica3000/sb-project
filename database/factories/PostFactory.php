<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        => $this->faker->sentence(rand(3, 7)),
            'alias'        => $this->faker->slug(),
            'short'        => $this->faker->text(),
            'body'         => $this->faker->paragraphs(rand(1, 3), true),
            'is_published' => $this->faker->boolean(),
            'user_id'      => rand(1, User::query()->count()),
        ];
    }
}
