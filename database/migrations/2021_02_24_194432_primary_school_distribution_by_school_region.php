<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolDistributionBySchoolRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primaryDistributionRegion', function (Blueprint $table) {
            $table->id();
            $table->integer('region')->index();
            $table->string('school_region',30);
            $table->string('founded_by',30);
            $table->integer('school_total');
            $table->year('enrolment_year');
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
        Schema::dropIfExists('primaryDistributionRegion');
    }
}
