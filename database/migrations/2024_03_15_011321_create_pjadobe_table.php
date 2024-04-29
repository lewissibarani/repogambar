<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePjadobeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adobe_pj', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nama');
            $table->bigInteger('adobe_status_pj_id');  
            $table->longtext('email');  
            $table->longtext('nohp');  
            $table->bigInteger('adobe_periode_id');
            $table->bigInteger('userid');
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
        Schema::dropIfExists('adobe_pj');
    }
}
