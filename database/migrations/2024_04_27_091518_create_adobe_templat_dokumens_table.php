<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdobeTemplatDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adobe_templat_dokumens', function (Blueprint $table) {
            $table->id();
            $table->longtext('jenistemplat'); 
            $table->longtext('path'); 
            $table->bigInteger('uploadedby'); 
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
        Schema::dropIfExists('adobe_templat_dokumens');
    }
}
