<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfController extends Controller
{
    public function generatePdf($id)
    {
        $entry = Entry::with('doctor')->findOrFail($id);
        $qrCode = QrCode::size(150)->generate(route('user.appointments') . '?email=' . $entry->email);
        return view('pdf.appointment', compact('entry', 'qrCode'));
    }
}
