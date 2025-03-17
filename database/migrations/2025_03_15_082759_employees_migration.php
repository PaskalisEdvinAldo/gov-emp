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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('fullname')->nullable(true)->default('');
            $table->string('birth_place')->nullable(true)->default('');
            $table->string('address')->nullable(true)->default('');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('religion');
            $table->string('phone')->unique();
            $table->string('tax_number', 16)->unique();
            $table->string('profile_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
