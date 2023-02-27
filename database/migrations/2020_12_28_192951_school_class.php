<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SchoolClass extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_class', function (Blueprint $table) {
            $table->id();
            $table->string('name',25);
            $table->integer('student_id');
            $table->integer('school_id');
            $table->string('stream',20);
            $table->enum('status',['current','previous']);
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
        Schema::dropIfExists('school_class');
    }
}
