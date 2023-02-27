<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimatyEnrolmentByClassAgeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_enrolment_by_class_age_data', function (Blueprint $table) {
            $table->id();
            $table->integer('males');
            $table->integer('females');
            $table->year('enrolment_year')->index();
            $table->integer('district')->index();
            $table->integer('region')->index();
            $table->integer('class')->index();
            $table->integer('age')->index();
            $table->integer('school');
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
        Schema::dropIfExists('primary_enrolment_by_class_age_data');
    }
}
