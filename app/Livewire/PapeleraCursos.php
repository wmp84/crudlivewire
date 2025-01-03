<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Component;

class PapeleraCursos extends Component
{
    public $cursos_papelera;
    public function mount()
    {
        $this->mostrarCursosPapelera();
    }
    private function mostrarCursosPapelera()
    {
        $this->cursos_papelera=Curso::onlyTrashed()->get();
    }
    public function render()
    {
        return view('livewire.papelera-cursos');
    }
}
