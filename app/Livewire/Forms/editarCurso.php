<?php

namespace App\Livewire\Forms;

use App\Models\Curso;
use Livewire\Attributes\Validate;
use Livewire\Form;

class editarCurso extends Form
{
    public $IdCurso;
    #[Validate("required", message:"El campo nombre es necesario")]
    public $nombre_curso;
    public $descripcion;
    #[Validate("required", message:"El campo precio es necesario")]
    public $precio;
    public function updateCurso()
    {
        $curso = Curso::find($this->IdCurso);
        $curso->update([
            "nombre_curso"=>$this->nombre_curso,
            "descripcion"=>$this->descripcion,
            "precio"=>$this->precio
        ]);
    }
}
