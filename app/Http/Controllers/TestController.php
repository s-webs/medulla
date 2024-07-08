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
        $pdfName = 'appointment_' . $entry->id . '_' . time() . '.pdf';
        return Browsershot::url(route('pdf-create', $entry->id))
            ->noSandbox()
            ->save('appointment-pdf/' . $pdfName);
    }
}
