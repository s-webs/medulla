<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index()
    {
        $services = Service::all();
        return view('pages.services.index', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::query()->where('slug', $slug)->first();
        return view('pages.services.serviceDetail', compact('service'));
    }
}
