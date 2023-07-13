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
        Schema::create('analyse', function (Blueprint $table) {
            $table->id();
            $table->date('date_depart');
            $table->date('date_arriver');
            $table->string('num_cart');
            $table->string('pdf');
            $table->bigInteger('account_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('analyse');
    }
};
