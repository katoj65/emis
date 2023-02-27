<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryEnrolmentDistrict extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_enrolment_district', function (Blueprint $table) {
            $table->id();
            $table->integer('region')->index();
            $table->integer('district')->index();
            $table->integer('class')->index();
            $table->integer('males');
            $table->integer('females');
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
        Schema::dropIfExists('primary_enrolment_district');
    }
}
