<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::all();
        return view('pages.team.index', compact('teams'));
    }

    public function show($id)
    {
        $doctor = Team::query()->findOrFail($id);
        return view('pages.team.show', compact('doctor'));
    }
}
