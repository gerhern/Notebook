<?php

namespace App\Modelos;
use Illuminate\Database\Eloquent\Model;

class Apunte extends Model{

    protected $table = 'apunte'; //le decimos al orm que la clase usara la tabla adjunto
    protected $primaryKey = 'id_apunte';
    public $incrementing = true;
    public $timestamp = false;

}
