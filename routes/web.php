<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, "index"])->name('home');
Route::get('/students',[StudentController::class, "index"])->name('students');

Route::prefix('/student')->group(function (){
    Route::get('/',[HomeController::class, "index"])->name('home');
    Route::post('/store',[HomeController::class, "store"])->name('home.store');
    Route::get('/edit',[HomeController::class, "edit"])->name('home.edit');
    Route::post('{student_id}/update',[HomeController::class, "update"])->name('home.update');
    Route::get('{student_id}/delete',[HomeController::class, "delete"])->name('home.delete');
    Route::get('{student_id}/change',[HomeController::class, "change"])->name('home.change');
});
