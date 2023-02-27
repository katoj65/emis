<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryTeacherGenderOwnership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_teacher_gender_ownership', function (Blueprint $table) {
            $table->id();
            $table->integer('region')->index();
            $table->integer('district')->index();
            $table->enum('gender',['Male','Female'])->index();
            $table->enum('status',['government','private']);
            $table->integer('teacher_count');
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
        Schema::dropIfExists('primary_teacher_gender_ownership');
    }
}
