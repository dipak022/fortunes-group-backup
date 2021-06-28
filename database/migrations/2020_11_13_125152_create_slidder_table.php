<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slidder', function (Blueprint $table) {
            $table->id();
            $table->string('slidder_image');
            $table->string('slidder_image_number');
            $table->string('name');
            $table->text('description');
            $table->string('short_description')->nullable();
            $table->string('btn_name')->nullable();
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
        Schema::dropIfExists('slidder');
    }
}
