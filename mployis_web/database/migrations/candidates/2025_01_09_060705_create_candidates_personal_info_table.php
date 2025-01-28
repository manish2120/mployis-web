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
        Schema::create('candidates_personal_info', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('candidates_id')
                  ->constrained('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('pancard_no')->unique();
            $table->string('aadhar_card_no')->unique();
            $table->enum('passport', ['Yes', 'No'])->nullable();
            $table->string('passport_no')->unique()->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates_personal_info');
    }
};
