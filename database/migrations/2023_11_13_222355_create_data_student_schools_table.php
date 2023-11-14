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
        Schema::create('data_student_schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_semester_id')->references('id')->on('class_semesters')->constrained()->cascadeOnDelete();
            $table->integer('science');
            $table->integer('indonesian_language_lesson');
            $table->integer('english_language_lesson');
            $table->integer('mathematics');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_student_schools');
    }
};
