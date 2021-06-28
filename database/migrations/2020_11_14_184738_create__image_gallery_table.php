<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ImageGallery', function (Blueprint $table) {
            $table->id();
            $table->string('show_all')->nullable();
            $table->string('gas')->nullable();
            $table->string('oil')->nullable();
            $table->string('industry')->nullable();
            $table->string('eno')->nullable();
            $table->string('factory')->nullable();
            $table->string('gallery_image');
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
        Schema::dropIfExists('ImageGallery');
    }
}
