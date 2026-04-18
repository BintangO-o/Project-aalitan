<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [CRUDController::class, 'index'])->name('todos.index');
Route::post('/todos', [CRUDController::class, 'store'])->name('todos.store');
Route::patch('/todos/{todo}', [CRUDController::class, 'update'])->name('todos.update');
Route::delete('/todos/{todo}', [CRUDController::class, 'destroy'])->name('todos.destroy');