<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Article::factory(50000)->create();

        if(config('database.default') === 'sqlite') {
            DB::statement("CREATE VIRTUAL TABLE IF NOT EXISTS articles_fts USING fts5(article_id UNINDEXED, title, content, tokenize = 'porter', content='articles', content_rowid='id');");
            DB::statement("INSERT INTO articles_fts(article_id, title, content) SELECT id, title, content FROM articles;");
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
