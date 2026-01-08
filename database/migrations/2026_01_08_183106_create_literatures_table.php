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
    Schema::create('literatures', function (Blueprint $table) {
        $table->id();
        $table->string('title');       // Наслов
        $table->string('author');      // Автор
        $table->text('content');       // Содржина
        $table->string('image')->nullable(); // Слика (опционално)
        $table->timestamps();          // created_at и updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('literatures');
    }
};
