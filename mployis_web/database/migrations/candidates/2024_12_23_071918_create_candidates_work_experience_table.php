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
        Schema::create('candidates_work_experience', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidates_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('job_title');
            $table->string('employee_type');
            $table->string('company_name');
            $table->string('location_type');
            $table->string('start_date');
            $table->string('is_currently_working');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates_work_experience');
    }
};
