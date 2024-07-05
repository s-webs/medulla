<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\LaravelPdf\Facades\Pdf;

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

    public function pdfGenerate($appointment_id)
    {
        $entry = Entry::query()->with('doctor')->findOrFail($appointment_id);
        $pdfName = 'appointment_' . $entry->id . '_' . time() . '.pdf';
        $qrCode = QrCode::size(150)->generate(route('user.appointments', $entry->email));
        return view('pdf.appointment', compact('entry', 'qrCode'));
        return Pdf::view('pdf.appointment', compact('entry', 'qrCode'))
            ->name($pdfName)
            ->save('appointment-pdf/' . $pdfName)
            ->download();
    }

    public function getUserAppointments($email)
    {
        $entries = Entry::with('doctor')
            ->where('email', $email)
            ->orderBy('start', 'desc')
            ->get()
            ->map(function ($entry) {
                return [
                    'start' => Carbon::parse($entry->start)->format('d-m-Y H:i'),
                    'doctor_name' => $entry->doctor->name,
                    'name' => $entry->name,
                    'pdf' => $entry->pdf,
                ];
            });

        return response()->json($entries);
    }

    public function userAppointments()
    {
        return view('pages.appointment.list');
    }
}
