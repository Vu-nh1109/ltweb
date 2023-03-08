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
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('password');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id')->primary();
            $table->foreign('student_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->integer('max_credit');
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
        Schema::dropIfExists('students');
        Schema::dropIfExists('accounts');
    }
};
