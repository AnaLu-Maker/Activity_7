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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')            // Relación con la tabla de usuarios
                  ->unique()
                  ->constrained('users')
                  ->onDelete('cascade');
            $table->foreignId('group_id')           // Relación con la tabla de grupos
                  ->constrained('groups')
                  ->onDelete('restrict');
            $table->date('enrollment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
