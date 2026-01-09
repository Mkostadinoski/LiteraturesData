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
    Schema::create('poezijas', function (Blueprint $table) {
        $table->id();
        $table->string('title');       // Наслов на поезијата
        $table->string('image')->nullable(); // URL или path до слика
        $table->string('author')->nullable(); // Автор
        $table->text('content');       // Содржина на поезијата
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poezijas');
    }
};
