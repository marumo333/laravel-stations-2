<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\SheetController;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/movies', [MovieController::class, 'index']);

// 管理者向けルート - 重複しているルート定義をすべて削除してこれだけにする
Route::get('/admin/movies', [AdminMovieController::class, 'index']);
Route::get('/admin/movies/create', [AdminMovieController::class, 'create']);
Route::post('/admin/movies/store', [AdminMovieController::class, 'store']);
Route::get('/admin/movies/{id}/edit', [AdminMovieController::class, 'edit']);
Route::patch('/admin/movies/{id}/update', [AdminMovieController::class, 'update']);
Route::delete('/admin/movies/{id}/destroy', [AdminMovieController::class, 'destroy']);
Route::get('/sheets', [App\Http\Controllers\SheetController::class, 'index']);
Route::get('/movies/{id}',[MovieController::class,'show']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('practice3', function () {
    $test = 'test';
    return response($test);
});