<?php

namespace Database\Factories;

use App\Models\Meta;
use Illuminate\Database\Eloquent\Factories\Factory;

class MetaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Meta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'content' => $this->faker->text,
            'content_ar' => 'محتوى',
            'type' => 'text',
            'page' =>  $this->faker->randomElement(['home', 'about-us', 'contact-us'])
        ];
    }
}
