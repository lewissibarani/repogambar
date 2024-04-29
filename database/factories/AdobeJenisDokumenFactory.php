<?php

namespace Database\Factories;

use App\Models\AdobeJenisDokumen;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdobeJenisDokumenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = AdobeJenisDokumen::class;


    public function definition()
    {
        return [  
            'jenisdokumen' => $this->faker->sentence(),
        ];
    }
}
