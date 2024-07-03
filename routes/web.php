<?php

use App\Http\Controllers\EntryController;
use Illuminate\Support\Facades\Route;
use MoonShine\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Публичные маршруты
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/services', [\App\Http\Controllers\ServicesController::class, 'index'])->name('service.index');
Route::get('/services/{slug}', [\App\Http\Controllers\ServicesController::class, 'show'])->name('service.show');
Route::get('/contacts', [\App\Http\Controllers\ContactsController::class, 'index'])->name('contacts.index');


// API для записей
Route::get('/get-available-times', [\App\Http\Controllers\CalendarController::class, 'getAvailableTimes'])->name('calendar.get-events');
Route::post('/entries', [EntryController::class, 'store']);
Route::get('/doctors/{id}', [EntryController::class, 'doctorShow']);


// Маршруты доступные только авторизованным
Route::middleware('auth.moonshine')->group(function () {
    Route::resource('/calendar', \App\Http\Controllers\CalendarController::class);
    // API Для записей
    Route::get('/entries', [EntryController::class, 'index']);
    Route::get('/get-events', [\App\Http\Controllers\CalendarController::class, 'getEvents'])->name('calendar.get-events');
    Route::get('/recent-entries', [\App\Http\Controllers\CalendarController::class, 'recentEntries']);
    Route::get('/entries/{id}', [EntryController::class, 'show']);
    Route::put('/entries/{id}', [EntryController::class, 'update']);
    Route::delete('/entries/{id}', [EntryController::class, 'destroy']);
});
