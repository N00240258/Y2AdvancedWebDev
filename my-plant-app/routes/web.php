<?php

use Illuminate\Support\Facades\Route;
use App\Http\Contollers\PlantController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/plants', [PlantController::class, 'index']);

?>