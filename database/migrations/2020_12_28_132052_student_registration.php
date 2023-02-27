<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('StudentRegistration', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->string('other_name',25);
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->string('nin',20);
            $table->string('emis_number',20);
            $table->string('parent_name',50);
            $table->string('passport_photo',50);
            $table->string('nationality',50);
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
        Schema::dropIfExists('StudentRegistration');
    }
}
