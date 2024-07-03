<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('pages.appointment.index');
    }

    public function single()
    {
        $doctors = Doctor::query()->where('active', 1)->get();
        return view('pages.appointment.single', compact('doctors'));
    }
}
