<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;

class TestController extends Controller
{
    public function index()
    {
        $entry = Entry::with('doctor')->findOrFail(65);
        $qrCode = QrCode::size(150)->generate(route('user.appointments') . '?email=' . $entry->email);
        $html = view('pdf.appointment', compact('entry', 'qrCode'))->render();
        $pdf = Browsershot::url('https://s-webs.kz')
            ->noSandbox();
        dd($pdf);
    }
}
