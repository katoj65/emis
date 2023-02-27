<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryTeacherSchoolGenderRegion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_teacher_school_gender_region', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id')->index();
            $table->integer('school')->index();
            $table->enum('gender',['Male','Female']);
            $table->integer('district')->index();
            $table->integer('region')->index();
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
        Schema::dropIfExists('primary_teacher_school_gender_region');
    }
}
