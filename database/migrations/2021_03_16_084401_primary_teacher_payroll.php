<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryTeacherPayroll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_teacher_payroll',
         function (Blueprint $table) {
            $table->id();
            $table->enum('gender',['male','female'])->index();
            $table->string('pay_roll')->index();
            $table->integer('teacher_total');
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
        Schema::dropIfExists('primary_teacher_payroll');
    }
}
