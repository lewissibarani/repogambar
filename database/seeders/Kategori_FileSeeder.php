<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class Kategori_FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_kategori' => "Indesign"
            ],
            [
                'nama_kategori' => "Ilustrator"
            ],
            [
                'nama_kategori' => "PSD"
            ],
            [
                'nama_kategori' => "Font"
            ]
        ]; 
        \DB::table('kategori_file')->insert($data);
    }
}
