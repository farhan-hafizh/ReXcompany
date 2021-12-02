<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_details', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('developer');
            $table->string('publisher');
            $table->date('release_date');
            $table->integer('price');
            $table->boolean('forAdult');
            $table->string('game_cover');
            $table->string('game_trailer');
            $table->longText('description');
            $table->longText('long_description');
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
        Schema::dropIfExists('game_details');
    }
}
