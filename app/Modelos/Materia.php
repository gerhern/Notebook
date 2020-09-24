<?php

namespace App\Modelos;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model{

    protected $table = 'materia'; //le decimos al orm que la clase usara la tabla adjunto
    protected $primaryKey = 'id_materia';
    public $incrementing = true;

}
