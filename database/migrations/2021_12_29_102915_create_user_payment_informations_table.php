<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_payment_informations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('card_name');
            $table->string('card_number');
            $table->integer('expired_month');
            $table->integer('expired_year');
            $table->integer('cvc_cvv');
            $table->integer('country_id');
            $table->integer('zip');
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
        Schema::dropIfExists('user_payment_informations');
    }
}
