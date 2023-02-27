<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolDistribution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_school_distribution', function (Blueprint $table) {
            $table->id();
            $table->integer('region');
            $table->integer('district');
            $table->integer('school_total');
            $table->string('founded_by');
            $table->string('registration_status');
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
        Schema::dropIfExists('primary_school_distribution');
    }
}
