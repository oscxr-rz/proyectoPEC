<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centro_acopio extends Model
{
    protected $connection = 'mysql';
    protected $table = 'centro_acopio';
    protected $primaryKey = 'id_centro_acopio';
    protected $fillable = [
        'nombre',
        'ubicacion',
        'telefono'
    ];

    public $timestamps = false;
}
