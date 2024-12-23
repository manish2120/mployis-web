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
        Schema::create('candidates_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidates_id')->constrained('candidates_data')->onDelete('cascade')->onUpdate('cascade');
            $table->string('profile_picture');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->enum('gender', ['male', 'female', 'other'])->nullable;
            $table->string('country');
            $table->string('state');
            $table->string('district');
            $table->string('phone_no')->unique();
            $table->string('pincode');
            $table->text('address');
            $table->date('date_of_birth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates_profile');
    }
};
