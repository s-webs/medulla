<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('pages.about.index');
    }

    public function treatment()
    {
        $services = Service::query()->where('type', 'therapy')->get();
        return view('pages.treatment.index', compact('services'));
    }

    public function diagnostics()
    {
        $services = Service::query()->where('type', 'diagnostic')->get();
        return view('pages.diagnostics.index', compact('services'));
    }
}
