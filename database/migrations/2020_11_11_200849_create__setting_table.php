<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Setting', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->integer('mobile_number')->nullable();
            $table->string('text')->nullable();
            $table->string('email');
            $table->string('address');
            $table->string('time');
            $table->string('coppyright')->nullable();
            $table->string('shedule');
            $table->string('fb_link');
            $table->string('tw_link')->nullable();
            $table->string('lind_link')->nullable();
            $table->string('instra_link')->nullable();
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
        Schema::dropIfExists('Setting');
    }
}
