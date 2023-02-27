<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryTeacherPayrollData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_teacher_payroll_data', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_count');
            $table->integer('year');
            $table->integer('district')->index();
            $table->integer('region')->index();
            $table->string('payroll',25)->nullable();
            $table->enum('gender',['Male','Female'])->index();
            $table->integer('school_id')->index();
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
        Schema::dropIfExists('primary_teacher_payroll_data');
    }
}
