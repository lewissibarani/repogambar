<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasreview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasreview', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('gambarid')->nullable(); 
            $table->bigInteger('petugasid'); 
            $table->bigInteger('statusreviewid');
            $table->string('komentar');
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
        Schema::dropIfExists('tugasreview');
    }
}
