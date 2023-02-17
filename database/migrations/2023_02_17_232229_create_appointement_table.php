<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointement', function (Blueprint $table) {
            $table->id();
            $table->json('childrens');
            $table->json('couples');
            $table->double('price');
            $table->double('priceReduced');
            $table->bigInteger('account_id')->unsigned()->index()->nullable();
            $table->bigInteger('doctor_id')->unsigned()->index()->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
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
        Schema::dropIfExists('appointement');
    }
};
