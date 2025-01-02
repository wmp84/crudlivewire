<?php

namespace App\Livewire;

use App\Livewire\Forms\saveCurso;
use Livewire\Component;
use MongoDB\Driver\Session;

class CreateCurso extends Component
{
    public saveCurso $curso;
    public function render()
    {
        return view('livewire.create-curso');
    }

public function save()
{
    $this->curso->store();

    //$this->dispatch("savecurso");
    session()->flash("success","Curso registrado");
    $this->redirect("/cursos",true);
}

}
