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
    public $sort = 'id_curso';
    public $direction = 'desc';

    #[On("borrado")]
    public function mount()
    {
        $this->mostrarCurso();
    }

    public function mostrarCurso()
    {
        $this->cursos = Curso::where("nombre_curso", "like", "%" . $this->search . "%")
            ->orWhere("descripcion", "like", "%" . $this->search . "%")
            ->orderBy($this->sort, $this->direction)
            ->get();

    }

    public function render()
    {
        return view('livewire.cursos');
    }

    public function confirmarEliminado($id, $cursoName)
    {
        $this->IdCurso = $id;
        $this->dispatch("confirmareliminado", "Estas seguro de eliminar el curso: $cursoName?");
    }

    #[On("eliminar")]
    public function BorrarCurso()
    {
        $curso = Curso::find($this->IdCurso);
        $curso->delete();
        $this->reset("IdCurso");
        $this->dispatch("borrado", "Eliminado correctamente");
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction='asc';
        }
        $this->mostrarCurso();
    }
}
