<?php

use App\Http\Controllers\CalculatorController;
use Illuminate\Support\Facades\Route;


Route::get('/{any}', [CalculatorController::class, "index"])->where('any', '.*');
