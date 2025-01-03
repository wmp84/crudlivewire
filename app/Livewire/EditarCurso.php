<?php

namespace App\Livewire;
use App\Livewire\Forms\editarCurso as FormsEditarCurso;
use App\Models\Curso;
use Livewire\Component;
use MongoDB\Driver\Session;

class EditarCurso extends Component
{
    public $curso;
    public FormsEditarCurso $cursoeditar;
    public function mount(Curso $curso)
    {
        $this->curso = $curso;
        $this->cursoeditar->IdCurso = $this->curso->id_curso;
        $this->cursoeditar->nombre_curso = $this->curso->nombre_curso;
        $this->cursoeditar->descripcion = $this->curso->descripcion;
        $this->cursoeditar->precio = $this->curso->precio;
    }
    public function render()
    {
        return view('livewire.editar-curso');
    }
    public function updateDatCurso()
    {
        $this->validate();
        $this->cursoeditar->updateCurso();
        $this->reset();
        session()->flash("success", "Curso modificado correctamente");
        $this->redirect("/cursos",true);
    }
}
