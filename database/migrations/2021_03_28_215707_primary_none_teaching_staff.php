<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryNoneTeachingStaff extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primary_none_teaching_staff', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->index();
            $table->integer('status')->index();
            $table->integer('males');
            $table->integer('females');
            $table->year('year')->index();
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
        Schema::dropIfExists('primary_none_teaching_staff');
    }
}
