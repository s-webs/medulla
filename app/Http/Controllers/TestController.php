<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;

class TestController extends Controller
{
    public function index()
    {
        $entry = Entry::with('doctor')->findOrFail(65);
        $pdfName = 'appointment_' . $entry->id . '_' . time() . '.pdf';
//        $qrCode = QrCode::size(150)->generate(route('user.appointments') . '?email=' . $entry->email);
        $qrCode = base64_encode(QrCode::format('svg')->size(150)->generate(route('user.appointments') . '?email=' . $entry->email));
        $pdf = Pdf::loadView('pdf.appointment', compact('entry', 'qrCode'));
        return $pdf->download('test.pdf');
        dd(1);
    }
}
