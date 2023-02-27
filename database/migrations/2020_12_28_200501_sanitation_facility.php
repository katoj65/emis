<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanitationFacility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanitation_facility', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Washrooms, Hand washing, Urinals, Toilet, Latrine']);
            $table->enum('usage',['Exclusively Boys, Exclusively girls ,Exclusively teachers, Mixed use']);
            $table->integer('number_of_units');
            $table->enum('status',['usable','unusable']);
            $table->integer('school_id');
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
        Schema::dropIfExists('sanitation_facility');

    }
}
