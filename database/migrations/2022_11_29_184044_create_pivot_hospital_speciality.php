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

        Schema::create('hospital_speciality', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('hospital_id')->unsigned()->index()->nullable();
            $table->bigInteger('speciality_id')->unsigned()->index()->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
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
        Schema::dropIfExists('pivot_hospital_speciality');
    }
};
