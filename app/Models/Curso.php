<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    protected $primaryKey = "id_curso";
    protected $fillable = ["nombre_curso","descripcion","precio"];
    use HasFactory, SoftDeletes;
}
