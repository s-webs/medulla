<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('pages.calendar.index', compact('doctors'));
    }

    public function getEvents(Request $request)
    {
        try {
            $events = [
                [
                    "_id" => 1,
                    "title" => "Meeting",
                    "description" => "Discussion about project.",
                    "start" => "2024-06-28T09:30",
                    "end" => "2024-06-28T15:00",
                    "type" => "Category1",
                    "username" => "John",
                    "backgroundColor" => "#D25565",
                    "textColor" => "#ffffff",
                    "allDay" => false
                ],
                // другие события
            ];

            Log::info('События, отправленные на клиент:', $events);

            return response()->json($events);
        } catch (\Exception $e) {
            Log::error('Ошибка при получении событий: ' . $e->getMessage());

            return response()->json(['error' => 'Ошибка при получении событий'], 500);
        }
    }

    public function getAvailableTimes(Request $request)
    {
        $doctorId = $request->input('doctor_id');
        $date = $request->input('date');
        $receptionTime = Doctor::query()->find($doctorId)->reception_time;

        try {
            $start = Carbon::createFromFormat('Y-m-d H:i', $date . ' 09:00');
            $end = Carbon::createFromFormat('Y-m-d H:i', $date . ' 17:30');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid date format: ' . $e->getMessage()], 400);
        }

        $existingEntries = Entry::query()->where('doctor_id', $doctorId)
            ->whereDate('date', $date)
            ->orderBy('time_start')
            ->get();

        $availableTimes = [];
        while ($start->lt($end)) {
            $available = true;
            foreach ($existingEntries as $entry) {
                try {
                    // Выводим данные для отладки
                    Log::info('Entry start: ' . $entry->time_start);
                    Log::info('Entry end: ' . $entry->time_end);

                    // Попробуем форматировать date_time
                    $entryStart = Carbon::createFromFormat('H:i', $entry->time_start);
                    $entryEnd = Carbon::createFromFormat('H:i', $entry->time_end);
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Invalid entry date format: ' . $e->getMessage()], 400);
                }

                if ($start->between($entryStart, $entryEnd, true)) {
                    $available = false;
                    break;
                }
            }
            if ($available) {
                $availableTimes[] = $start->format('H:i');
            }
            $start->addMinutes($receptionTime);
        }

        return response()->json(['available_times' => $availableTimes]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
