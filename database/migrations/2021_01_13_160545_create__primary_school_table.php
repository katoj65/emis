<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrimarySchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_school', function (Blueprint $table) {
            $table->id();
            $table->string('region',200)->index()->nullable();
            $table->string('district',200)->index()->nullable();
            $table->string('county',200)->index()->nullable();
            $table->string('subcounty',200)->index()->nullable();
            $table->string('parish',200)->index()->nullable();
            $table->string('contact',200)->index()->nullable();
            $table->string('emis',200)->index()->nullable();

            $table->integer('p1male')->nullable();
            $table->integer('p1female')->nullable();

            $table->integer('p2male')->nullable();
            $table->integer('p2female')->nullable();

            $table->integer('p3male')->nullable();
            $table->integer('p3female')->nullable();

            $table->integer('p4male')->nullable();
            $table->integer('p4female')->nullable();

            $table->integer('p5male')->nullable();
            $table->integer('p5female')->nullable();

            $table->integer('p6male')->nullable();
            $table->integer('p6female')->nullable();

            $table->integer('p7male')->nullable();
            $table->integer('p7female')->nullable();

            $table->string('registration_status',200)->nullable()->index();
            $table->string('distance_to_school',200)->nullable()->index();
            $table->string('distance_to_deo',200)->nullable()->index();
            $table->string('school_type',200)->nullable()->index();
            $table->string('boarding_type',200)->nullable()->index();
            $table->string('funding_source',200)->nullable()->index();
            $table->string('founding_body',200)->nullable()->index();
            $table->string('location',200)->nullable()->index();
            $table->string('no_school_was_inspected',200)->nullable()->index();
            $table->string('highest_grade',200)->nullable()->index();
            $table->string('txtschoolcode',200)->nullable()->index();

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
        Schema::dropIfExists('primary_school');
    }
}
