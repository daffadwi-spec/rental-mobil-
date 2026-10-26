<?php

use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('rental.index'));
Route::resource('rental', RentalController::class)->except('show');