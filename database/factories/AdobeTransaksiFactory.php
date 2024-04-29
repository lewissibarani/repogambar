<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AdobeTransaksi;


class AdobeTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = AdobeTransaksi::class;

    public function definition()
    {
        return [
            'userid' => rand(1,5),
            'dokumenid' => rand(1,2),
            'periodeid' => rand(1,3),
            'deskripsi' => $this->faker->sentence(),

        ];
    }
}
