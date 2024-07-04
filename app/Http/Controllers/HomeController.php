<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::query()->take(5)->latest()->get();
        $reviews = Review::all();
        $gallery = Gallery::all();
        $teams = Team::query()->orderBy('id', 'asc')->get();
        $services = Service::all();
        return view('pages.home.index', compact('services', 'teams', 'gallery', 'reviews', 'articles'));
    }
}
