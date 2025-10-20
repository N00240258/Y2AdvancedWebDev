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
        // creates the course table is phpMyAdmin with certain requirements if stated like "length" in string course code
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('courseCode', length: 5);
            $table->text('title');
            $table->text('description');
            $table->integer('points');
            $table->integer('years');
            $table->string('image');
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
