<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tblnonteachingstaffinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblnonteachingstaffinfo', function (Blueprint $table) {
            $table->integer('intNonTeachingStaffInfoId');
            $table->integer('intNonTeachingStaffTypeId');
            $table->integer('intSchoolId');
            $table->integer('intMaleStaffCount')->nullable();
            $table->integer('intFeMaleStaffCount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblnonteachingstaffinfo');
    }
}
