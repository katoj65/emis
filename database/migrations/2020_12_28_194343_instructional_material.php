<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InstructionalMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InstructionalMaterial', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->enum('type',['textbooks,teachers guides,novels,readers,dictionary','atlas']);
            $table->integer('subject_id');
            $table->integer('school_id');
            $table->integer('lab_equipment_id');
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
        Schema::dropIfExists('InstructionalMaterial');
    }
}
