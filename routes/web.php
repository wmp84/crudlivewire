<?php

use App\Livewire\CreateCurso;
use App\Livewire\Cursos;
use App\Livewire\EditarCurso;
use App\Livewire\PapeleraCursos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/cursos", Cursos::class)->name("cursos");
Route::get("/curso/create", CreateCurso::class)->name("curso.create");
Route::get("/curso/{curso}/editar",EditarCurso::class)->name("curso.editar");
Route::get("/cursos/papelera",PapeleraCursos::class)->name("curso.papelera");
