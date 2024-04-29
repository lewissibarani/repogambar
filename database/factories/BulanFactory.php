<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bulan;

class BulanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Bulan::class;


    public function definition()
    {
        return [ 
            'namabulan' => $this->faker->sentence(),
            //
        ];
    }
}
