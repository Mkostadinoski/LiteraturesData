<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('literatures', function (Blueprint $table) {
        $table->id();
        $table->string('title');          // Наслов на делото
        $table->string('image')->nullable(); // Патека или URL до слика
        $table->text('content');          // Содржина/опис
        $table->string('author');         // Автор
        $table->timestamps();             // created_at и updated_at автоматски
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
