<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrolmentByClassAgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolment_by_class_age', function (Blueprint $table) {
            $table->id();
            $table->integer('age_id')->index()->nullable();
            $table->integer('school_education_grade_id')->index()->nullable();
            $table->integer('school_id')->index()->nullable();
            $table->integer('male_student_count')->nullable();
            $table->integer('female_student_count')->nullable();
            $table->timestamps();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolment_by_class_age');
    }
}
