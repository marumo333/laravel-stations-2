<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. 既存のユニーク制約を削除
        DB::statement('ALTER TABLE movies DROP INDEX movies_title_unique');
        
        // 2. titleカラムをtext型に変更
        DB::statement('ALTER TABLE movies MODIFY COLUMN title TEXT NOT NULL');
        
        // 3. TEXT型でのユニーク制約を追加（最初の255文字）
        DB::statement('ALTER TABLE movies ADD UNIQUE movies_title_unique (title(255))');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE movies DROP INDEX movies_title_unique');
        DB::statement('ALTER TABLE movies MODIFY COLUMN title VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE movies ADD UNIQUE movies_title_unique (title)');
    }
};