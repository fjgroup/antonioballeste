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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('city');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->json('schedule_details')->nullable(); // Arrays de {day: 'Lunes', date: '27 Feb', note: ''}
            $table->string('slug')->unique(); // Para la URL amigable
            $table->longText('content')->nullable(); // Para el artículo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
