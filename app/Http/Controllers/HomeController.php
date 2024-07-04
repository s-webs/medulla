<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $gallery = Gallery::all();
        $teams = Team::query()->orderBy('id', 'asc')->get();
        $services = Service::all();
        return view('pages.home.index', compact('services', 'teams', 'gallery'));
    }
}
