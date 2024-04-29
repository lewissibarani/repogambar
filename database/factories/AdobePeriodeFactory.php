<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AdobePeriode;

class AdobePeriodeFactory extends Factory
{
   /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = AdobePeriode::class;

    public function definition()
    {
        return [ 
            'tahun_pengadaan' => rand(2023,2025),
            'range_pengadaan' => $this->faker->sentence(),
            'catatan_pengadaan' => $this->faker->sentence(),
        ];
    }
}
