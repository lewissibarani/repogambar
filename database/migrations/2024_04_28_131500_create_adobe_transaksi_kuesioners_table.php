<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdobeTransaksiKuesionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adobe_transaksi_kuesioner', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid'); 
            $table->bigInteger('periodeid');
            $table->bigInteger('bulanid');
            $table->longtext('apakahmemakaiadobe');
            $table->longtext('memakaiadobeuntukapa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adobe_transaksi_kuesioners');
    }
}
