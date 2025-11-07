<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('article_slug', 160)->index();
            $table->string('name', 120);
            $table->unsignedTinyInteger('rating')->default(5); // 1..5
            $table->text('body');
            $table->boolean('approved')->default(true); // đơn giản: auto duyệt
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('comments');
    }
};
