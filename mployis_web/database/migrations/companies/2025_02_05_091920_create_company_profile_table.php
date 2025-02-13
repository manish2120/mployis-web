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
        Schema::create('company_profile', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable(); 
            $table->string('designated_hr')->nullable(); 
            $table->string('email')->nullable(); 
            $table->string('phone_no')->nullable(); 
            $table->string('address')->nullable(); 
            $table->string('country')->nullable(); 
            $table->string('state')->nullable(); 
            $table->string('city')->nullable(); 
            $table->string('pincode')->nullable(); 
            $table->string('logo')->nullable(); 
            $table->string('industry_type')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0);
            // $table->unsignedBigInteger('hr_id')->nullable();
            $table->foreignId('company_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade'); // Foreign key to 'companies' table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profile');
    }
};
