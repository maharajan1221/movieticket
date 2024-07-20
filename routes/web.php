<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[MovieController::class,'index']);
Route::get('/add-movies', [MovieController::class,'create'])->name('movies.create');
Route::post('/add-movie',  [MovieController::class,'store'])->name('movies.store');
Route::get('/movies/{movie}/showtimes', [MovieController::class,'showtimes'])->name('showtimes.create');
Route::post('/movies/{movie}/showtimes', [MovieController::class,'storeShowtime'])->name('showtimes.store');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');
Route::post('/book',[BookingController::class,'book']);
Route::get('/download-ticket/{booking}', [BookingController::class, 'downloadTicket'])->name('download.ticket');

