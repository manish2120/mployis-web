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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->enum('location_type', ['On-Site', 'Hybrid', 'Remote'])->nullable();
            $table->string('location')->nullable();
            $table->enum('employment_type', ['Full-Time', 'Part-Time', 'Contract', 'Internship'])->nullable();
            $table->text('description')->nullable();
            $table->string('pincode')->nullable();
            $table->text('required_skills')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('qualifications')->nullable();
            $table->string('salary')->nullable();
            $table->foreignId('company_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
