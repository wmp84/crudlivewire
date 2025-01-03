<?php

namespace App\Livewire;

use App\Models\Curso;
use Livewire\Attributes\On;
use Livewire\Component;

class Cursos extends Component
{
    public $cursos;
    public $IdCurso;
    public $search;
    #[On("borrado")]
    public function mount()
    {
        $this->mostrarCurso();
    }
    public function mostrarCurso()
    {
        $this->cursos=Curso::where("nombre_curso","like", "%".$this->search."%")
            ->orwhere("descripcion","like", "%".$this->search."%")
            ->get();
    }
    public function render()
    {
        return view('livewire.cursos');
    }
    public function confirmarEliminado($id,$cursoName)
    {
        $this->IdCurso=$id;
        $this->dispatch("confirmareliminado","Estas seguro de eliminar el curso: $cursoName?");
    }
    #[On("eliminar")]
    public function BorrarCurso()
    {
        $curso = Curso::find($this->IdCurso);
        $curso->delete();
        $this->reset("IdCurso");
        $this->dispatch("borrado", "Eliminado correctamente");
    }
}
