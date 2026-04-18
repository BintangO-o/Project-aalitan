<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [CRUDController::class, 'index']);
