<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});

// Todos resource routes
Route::resource('todos', TodoController::class)->only(['index', 'show']);
