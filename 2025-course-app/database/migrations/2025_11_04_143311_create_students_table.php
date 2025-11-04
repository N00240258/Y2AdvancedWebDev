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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // cascade: If the course is delete/removed then so will the enrolled students
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->text('student_name');
            $table->string('student_email', length:100);
            $table->integer('age');
            $table->integer('year');
            $table->decimal('average_grade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
