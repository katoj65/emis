<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolWaterSourceDistance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_school_water_source_distance', function (Blueprint $table) {
            $table->id();
            $table->integer('region')->index();
            $table->integer('district')->index();
            $table->integer('distance')->index();
            $table->integer('status')->index();
            $table->integer('school_count');
            $table->year('school_year')->index();
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
        Schema::dropIfExists('primary_school_water_source_distance');
    }
}
