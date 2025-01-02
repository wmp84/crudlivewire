<?php

use App\Livewire\Cursos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/cursos", Cursos::class)->name("cursos");
