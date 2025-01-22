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
        Schema::create('profile_details', function (Blueprint $table) {
            $table->id(); // Primary key for the table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key referencing 'users'
            $table->string('profile_picture')->nullable(); // Path to the uploaded profile picture
            $table->text('about')->nullable();
            $table->string('education')->nullable();
            $table->string('current_organization')->nullable();
            $table->string('current_position')->nullable();
            $table->string('skills')->nullable();
            $table->string('interests')->nullable();
            $table->string('experience')->nullable();
            $table->enum('role', ['Examiner', 'Examinee']);
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_details');
    }
};
