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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_key', 50)->unique(); // Clave unica del curso (Rob 101, Rob 102, etc.)
            $table->string('title', 200);
            $table->string('cover')->nullable(); // ruta de la imagen de portada del curso
            $table->text('content')->nullable();
            $table->unsignedBigInteger('robotics_kit_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
