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
        Schema::create('hospital', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('address');
            $table->string('phone_number');
            $table->string('latitude');
            $table->string('longitude');
            $table->bigInteger('speciality_id')->unsigned()->index()->nullable();
            $table->foreign('speciality_id')->references('id')->on('speciality')->onDelete('cascade');
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
        Schema::dropIfExists('hospital');
    }
};
