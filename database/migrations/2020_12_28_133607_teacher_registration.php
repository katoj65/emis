<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeacherRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_registration', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->string('other_name',25);
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->string('address',50);
            $table->string('nin',20);
            $table->string('emis_number',20);
            $table->string('passport_photo',50);
            $table->string('nationality',50);
            $table->string('primary_telephone',15);
            $table->string('secondary_telephone',15);
            $table->string('email_address',50);
            $table->string('qualification',50);
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
        Schema::dropIfExists('teacher_registration');
    }
}
