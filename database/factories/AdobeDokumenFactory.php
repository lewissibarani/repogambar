<?php

namespace Database\Factories;

use App\Models\AdobeDokumen;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdobeDokumenFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array
     */
    protected $model = AdobeDokumen::class;

    public function definition()
    {
        return [
            'jenisdokumenid' => rand(1,5),
            'path' => $this->faker->sentence(),
            'filename' => $this->faker->sentence(),
        ];
    }
}
