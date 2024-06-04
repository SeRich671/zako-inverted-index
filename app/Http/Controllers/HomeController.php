<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request) {
        if(config('database.default')) {
            $query = $request->get('query');
            $articles = Article::query();


            if (trim($query) != '') {
                $articles = $articles->orWhere('content', 'LIKE', '%' . $query . '%');
            }

            $time_start = microtime(true);
            $articles = $articles->paginate(20);
        }else {
            $query = $request->get('query');
            $articlesQuery = DB::table('articles');

            if (trim($query) != '') {
                $ftsQuery = str_replace(' ', '+', addslashes($query));
                $articlesQuery = $articlesQuery
                    ->join('articles_fts', 'articles_fts.rowid', '=', 'articles.id')
                    ->whereRaw("articles_fts MATCH ?", [$ftsQuery]);
            }

            $time_start = microtime(true);
            $articles = $articlesQuery->select('articles.*')
                ->paginate(20);
        }


        return view('welcome', compact('articles'));
    }

    public function search() {

    }

    public function show($slug) {
        $article = Article::where('slug', $slug)->first();

        return view('article.show', compact('article'));
    }
}
