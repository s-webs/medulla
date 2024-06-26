<?php

use App\Http\Controllers\EntryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/services', [\App\Http\Controllers\ServicesController::class, 'index'])->name('service.index');
Route::get('/services/{slug}', [\App\Http\Controllers\ServicesController::class, 'show'])->name('service.show');
Route::get('/contacts', [\App\Http\Controllers\ContactsController::class, 'index'])->name('contacts.index');
Route::resource('/calendar', \App\Http\Controllers\CalendarController::class);
Route::get('/get-events', [\App\Http\Controllers\CalendarController::class, 'getEvents'])->name('calendar.get-events');
Route::get('/get-available-times', [\App\Http\Controllers\CalendarController::class, 'getAvailableTimes'])->name('calendar.get-events');

Route::get('/entries', [EntryController::class, 'index']);
Route::post('/entries', [EntryController::class, 'store']);
Route::get('/entries/{id}', [EntryController::class, 'show']);
Route::put('/entries/{id}', [EntryController::class, 'update']);
Route::delete('/entries/{id}', [EntryController::class, 'destroy']);
Route::get('/doctors/{id}', [EntryController::class, 'doctorShow']);
