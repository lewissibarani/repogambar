<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('gambar', function (Blueprint $table) {
        //     $table->string('judul');
        //     $table->longText('link');
        //     $table->longText('path');
        //     $table->string('idKegunaan');
        //     $table->string('idUser');
        //     $table->string('metadata');
        //     $table->longText('catatan');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gambar', function (Blueprint $table) {
            //
        });
    }
}
