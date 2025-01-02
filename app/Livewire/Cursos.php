<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Component;

class Cursos extends Component
{
    public $cursos;
    public function mount()
    {
        $this->mostrarCurso();
    }
    public function mostrarCurso()
    {
        $this->cursos=Curso::all();
    }
    public function render()
    {
        return view('livewire.cursos');
    }
}
