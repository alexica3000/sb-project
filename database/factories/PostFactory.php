<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title'        => $this->faker->title(),
            'alias'        => $this->faker->slug(),
            'short'        => $this->faker->text(),
            'body'         => $this->faker->paragraphs(rand(1, 3)),
            'is_published' => $this->faker->boolean(),
            'user_id'      => 1,
        ];
    }
}
