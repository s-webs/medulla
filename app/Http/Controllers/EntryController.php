<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Entry::with('doctor')->get();
        return response()->json($entries);
    }

    public function doctorShow($id)
    {
        $doctor = Doctor::query()->findOrFail($id);
        return response()->json($doctor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'status' => 'required|string|max:255',
        ]);

        $entry = new Entry();
        $entry->doctor_id = $validatedData['doctor_id'];
        $entry->name = $validatedData['name'];
        $entry->phone = $validatedData['phone'];
        $entry->email = $validatedData['email'];
        $entry->date = $validatedData['date'];
        $entry->time_start = $validatedData['time_start'];
        $entry->time_end = $validatedData['time_end'];
        $entry->status = $validatedData['status'];
        $entry->save();

        return response()->json(['success' => true, 'entry' => $entry], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $entry = Entry::query()->findOrFail($id);

        $validatedData = $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'date' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'status' => 'required|string|max:255',
        ]);

        $entry->update($request->all());
        return response()->json($entry);
    }

    public function destroy($id)
    {
        $entry = Entry::query()->findOrFail($id);
        $entry->delete();
        return response()->json(null, 204);
    }
}
