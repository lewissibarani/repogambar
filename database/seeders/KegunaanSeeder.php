<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegunaan;

class KegunaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kegunaan::create([
            'kegunaan' => 'Pembuatan Infografis',
        ]);

        Kegunaan::create([
            'kegunaan' => 'Pembuatan Cover DDA',
        ]);

        Kegunaan::create([
            'kegunaan' => 'Pembuatan Cover Publikasi',
        ]);

        Kegunaan::create([
            'kegunaan' => 'Kebutuhan Media Cetak (Spanduk/Baliho/Banner)',
        ]);
    }
}
