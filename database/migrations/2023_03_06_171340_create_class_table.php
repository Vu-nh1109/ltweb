<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_models', function (Blueprint $table) {
            $table->string('class_id')->primary();
            $table->string('course_id');
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->integer('max_students');
            $table->string('attached_class_id')->nullable();
            $table->timestamps();
        });

        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('class_id');
            $table->foreign('class_id')->references('class_id')->on('class_models')->onDelete('cascade');
            $table->string('day_of_week');
            $table->time('start_at');
            $table->time('end_at');
            $table->string('location');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_schedules');
        Schema::dropIfExists('class_models');
    }
};
