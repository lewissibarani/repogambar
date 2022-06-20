<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'level' => 'SuperAdmin',
        ]);

        Level::create([
            'level' => 'Task Master',
        ]);

        Level::create([
            'level' => 'Petugas',
        ]);

        Level::create([
            'level' => 'User',
        ]);
    }
}
