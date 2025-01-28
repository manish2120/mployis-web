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
        Schema::create('candidates_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidates_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('phone_no')->unique();
            $table->string('pincode');
            $table->text('address')->nullable();
            $table->date('date_of_birth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates_information');
    }
};
