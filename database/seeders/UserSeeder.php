<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Lewis Anggi',
        //     'email' => 'lewissibarani@gmail.com',
        //     'password' => Hash::make('NorwegianWood'),
        //     'nohp' => '082191492198',
        //     'satker'=> 'Fungsi Publikasi dan Kompilasi Statistik',
        //     'level'=> '0',

        // ]);

        // User::create([
        //     'name' => 'Administrator',
        //     'email' => 'lewis.anggi@gmail.com',
        //     'password' => Hash::make('NorwegianWood'),
        //     'nohp' => '082191492198',
        //     'satker'=> 'BPS Provinsi Kalimantan Timur',
        //     'level'=> '1',

        // ]);
    }
}
