<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    protected $connection = 'mysql';
    protected $table = 'dispositivo';
    protected $primaryKey = 'id_dispositivo';
    protected $fillable = [
        'nombre_dispositivo',
        'marca',
        'modelo',
        'descripcion',
        'estado_fisico',
        'id_categoria',
        'id_donacion'
    ];
    public $timestamps = false;
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }
}
