<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('practice3', function () {
    $test = 'test';
    return response($test);
});
