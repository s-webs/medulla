<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::all()->map(function ($article) {
            $article->formatted_date = Carbon::parse($article->created_at)->locale('ru')->isoFormat('LL');
            return $article;
        });

        return view('pages.blog.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::query()->where('slug', $slug)->firstOrFail();
        $article->formatted_date = Carbon::parse($article->created_at)->locale('ru')->isoFormat('LL');

        return view('pages.blog.detail', compact('article'));
    }
}
