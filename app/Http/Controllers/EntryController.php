<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Entry;
use Carbon\Carbon;
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
        $doctorId = $request->input('doctor_id');
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $status = $request->input('status');
        $timeStart = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('start'));

        // Получаем время приема врача в минутах
        $doctor = Doctor::findOrFail($doctorId);
        $receptionTime = $doctor->reception_time;

        // Рассчитываем время окончания приема
        $timeEnd = $timeStart->copy()->addMinutes($receptionTime);

        // Проверяем наличие пересекающихся записей
        $existingEntries = Entry::where('doctor_id', $doctorId)
            ->where(function ($query) use ($timeStart, $timeEnd) {
                $query->where(function ($query) use ($timeStart, $timeEnd) {
                    $query->where('start', '<', $timeEnd)
                        ->where('end', '>', $timeStart);
                });
            })
            ->count();

        if ($existingEntries > 0) {
            return response()->json(['message' => 'Time slot already taken'], 409);
        }

        // Создаем новую запись
        $entry = new Entry();
        $entry->doctor_id = $doctorId;
        $entry->name = $name;
        $entry->phone = $phone;
        $entry->email = $email;
        $entry->start = $timeStart;
        $entry->end = $timeEnd;
        $entry->status = $status;
        $entry->save();

        return response()->json(['message' => 'Appointment created successfully']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $entry = Entry::findOrFail($id);

        // Обновление данных записи
        $entry->doctor_id = $request->input('doctor_id');
        $entry->name = $request->input('name');
        $entry->phone = $request->input('phone');
        $entry->email = $request->input('email');

        $start = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('start'));
        $entry->start = $start;

        // Найти врача и установить время окончания на основе времени приема
        $doctor = Doctor::findOrFail($request->input('doctor_id'));
        $end = $start->copy()->addMinutes($doctor->reception_time);
        $entry->end = $end;

        $entry->save();

        return response()->json(['message' => 'Запись успешно обновлена']);
    }


    public function destroy($id)
    {
        $entry = Entry::query()->findOrFail($id);
        $entry->delete();
        return response()->json(null, 204);
    }
}
