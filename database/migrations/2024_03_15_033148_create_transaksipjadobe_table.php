<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksipjadobeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adobe_transaksipj', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid'); 
            $table->bigInteger('pj_adobe_lama_id');
            $table->bigInteger('pj_adobe_baru_id');
            $table->longtext('alasan');
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
        Schema::dropIfExists('adobe_transaksipj');
    }
}
