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
        Schema::dropIfExists('practices');
        Schema::create('practices', function (Blueprint $table) {
            $table->id();
            $table->text('title')->comment('タイトル');
            $table->timestamps();
        });
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->text('title')->comment('映画タイトル');
            $table->text('image_url')->comment('画像URL');
            $table->integer('published_year')->nullable()->comment('公開年');
            $table->text('description')->nullable()->comment('概要');
            $table->tinyInteger('is_showing')->default(false)->comment('上映するかどうか');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practices');
        Schema::dropIfExists('movies');
    }
};
