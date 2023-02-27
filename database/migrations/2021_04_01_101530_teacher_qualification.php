<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeacherQualification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_qualification', function (Blueprint $table) {
            $table->integer('intHighestTeachingQualificationId')->index();
            $table->string('txtHighestTeachingQualification')->nullable();
            $table->integer('intEduLevelId')->nullable();
            $table->string('Comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_qualification');
    }
}
