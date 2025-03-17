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
        Schema::create('occupations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('nip', 18)->nullable(true)->default('');
            $table->string('group');
            $table->string('echelon')->nullable(true)->default('');
            $table->string('position')->nullable(true)->default('');
            $table->string('duty_station')->nullable(true)->default('');
            $table->string('work_unit')->nullable(true)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('occupations');
    }
};
