<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->keyBy('id');
        return view('pages.contacts.index', compact('settings'));
    }
}
