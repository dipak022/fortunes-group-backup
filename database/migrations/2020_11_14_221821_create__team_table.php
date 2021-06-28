<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Team', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('short_description')->nullable();
            $table->string('image');
            $table->string('fb_link')->nullable();
            $table->string('telegram_link')->nullable();
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
        Schema::dropIfExists('Team');
    }
}
