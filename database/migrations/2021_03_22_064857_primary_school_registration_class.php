<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimarySchoolRegistrationClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_school_registration_class', function (Blueprint $table) {
            $table->id();
            $table->integer('class')->index();
            $table->integer('registration')->index();
            $table->integer('founder')->index();
            $table->integer('males');
            $table->integer('females');
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
        Schema::dropIfExists('primary_school_registration_class');
    }
}
