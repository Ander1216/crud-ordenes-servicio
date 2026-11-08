<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdenServicioController;

Route::get('/', function () {
    return redirect('/ordenes');
});

Route::resource('ordenes', OrdenServicioController::class)
    ->except(['show','destroy']);