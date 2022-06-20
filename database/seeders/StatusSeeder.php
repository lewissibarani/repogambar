<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Status;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status' => 'Diproses',
        ]);

        Status::create([
            'status' => 'Ditolak',
        ]);

        Status::create([
            'status' => 'Selesai',
        ]);

        Status::create([
            'status' => 'Duplikat',
        ]);
    }
}
