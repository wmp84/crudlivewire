<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Attributes\On;
use Livewire\Component;

class PapeleraCursos extends Component
{
    public $cursos_papelera;
    public $CursoId;

    public function mount()
    {
        $this->mostrarCursosPapelera();
    }

    private function mostrarCursosPapelera()
    {
        $this->cursos_papelera = Curso::onlyTrashed()->get();
    }

    public function ConfirmarBorrado($id, $cursoName)
    {
        $this->CursoId = $id;
        $this->dispatch("confirm-borrado", "Estas seguro de eliminar al curso" . $cursoName);
    }

    #[On("ok-borrado")]
    public function Borrado()
    {
        $curso = Curso::onlyTrashed()->find($this->CursoId);
        $curso->forceDelete();
        $this->reset("CursoId");
        $this->dispatch("success-borrado", "Curso borrado correctamente");
        $this->mostrarCursosPapelera();
    }
    public function activar($id)
    {
        $curso = Curso::onlyTrashed()->find($id);
        $curso->restore();
        $this->dispatch("activado","Curso activado correctamente");
        $this->mostrarCursosPapelera();
    }
    public function render()
    {
        return view('livewire.papelera-cursos');
    }
}
