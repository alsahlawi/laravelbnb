<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bookable;
use Illuminate\Support\Arr;

class BookableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bookable::class;
    public $suffix = [
        "Villa",
        "House",
        "Cottage",
        "Luxery Villas",
        "Cheap Villas",
        "Rooms",
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->city. ' '. Arr::random($this->suffix) ,
            'description' => $this->faker->text,
        ];
    }
}
