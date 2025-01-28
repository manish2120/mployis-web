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
        Schema::create('candidates_education_twelfth_grade', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidates_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('college_name');
            $table->string('board_name');
            $table->string('grade_or_percentage');
            $table->string('year_of_passing');
            $table->string('passing_certificate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates_education_twelfth_grade');
    }
};
