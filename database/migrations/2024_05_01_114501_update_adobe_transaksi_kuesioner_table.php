<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdobeTransaksiKuesionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::table('adobe_transaksi_kuesioner', function (Blueprint $table) {
            $table->tinyInteger('suratdokumen')->after('kodesatker'); 
            $table->tinyInteger('dashboard')->after('kodesatker'); 
            $table->tinyInteger('website')->after('kodesatker'); 
            $table->tinyInteger('video')->after('kodesatker'); 
            $table->tinyInteger('infografis')->after('kodesatker'); 
            $table->tinyInteger('brs')->after('kodesatker'); 
            $table->tinyInteger('publikasi')->after('kodesatker'); 
            $table->tinyInteger('xd')->after('kodesatker'); 
            $table->tinyInteger('premiererush')->after('kodesatker'); 
            $table->tinyInteger('premierepro')->after('kodesatker'); 
            $table->tinyInteger('photoshop')->after('kodesatker'); 
            $table->tinyInteger('lightroom')->after('kodesatker'); 
            $table->tinyInteger('indesign')->after('kodesatker'); 
            $table->tinyInteger('incopy')->after('kodesatker'); 
            $table->tinyInteger('illustrator')->after('kodesatker'); 
            $table->tinyInteger('fresco')->after('kodesatker'); 
            $table->tinyInteger('express')->after('kodesatker'); 
            $table->tinyInteger('dreamweaver')->after('kodesatker'); 
            $table->tinyInteger('dimension')->after('kodesatker'); 
            $table->tinyInteger('audition')->after('kodesatker'); 
            $table->tinyInteger('animate')->after('kodesatker'); 
            $table->tinyInteger('aftereffect')->after('kodesatker'); 
            $table->tinyInteger('aero')->after('kodesatker'); 
            $table->tinyInteger('acrobat')->after('kodesatker'); 
            $table->tinyInteger('memakaiadobe')->after('kodesatker'); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
