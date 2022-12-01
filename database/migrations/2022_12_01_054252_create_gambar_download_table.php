<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gambar_download', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("gambar_id");
            $table->string("titleslug");
            $table->string("url");
            $table->string("session_id");
            $table->unsignedInteger('user_id')->nullable();
            $table->string("ip");
            $table->string("agent");
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
        Schema::dropIfExists('gambar_download');
    }
}
