<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SchoolInfrastructure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_infrastructure', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['classroom','computer lab','latrines blocks','library','office','staff rooms','teacher houses','workshops','student hostel','sick bay']);
            $table->enum('status',['usable','under construction']);
            $table->integer('sitting_capacity');
            $table->date('date_of_construction');
            $table->integer('school_id');
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
        Schema::dropIfExists('school_infrastructure');
    }
}
