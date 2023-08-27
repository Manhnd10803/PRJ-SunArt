<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->date('lesson1')->nullable();
            $table->date('lesson2')->nullable();
            $table->date('lesson3')->nullable();
            $table->date('lesson4')->nullable();
            $table->date('lesson5')->nullable();
            $table->date('lesson6')->nullable();
            $table->date('lesson7')->nullable();
            $table->date('lesson8')->nullable();
            $table->date('lesson9')->nullable();
            $table->date('lesson10')->nullable();
            $table->string('tuitionFee')->nullable();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
