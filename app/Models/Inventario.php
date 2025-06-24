<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $connection = 'mysql';
    protected $table = 'inventario';
    protected $primaryKey = 'id_inventario';
    protected $fillable = [
        'fecha_ingreso',
        'fecha_salida',
        'disponible',
        'precio_estimado',
        'observaciones_inventario',
        'id_dispositivo',
        'id_paquete'
    ];
    public $timestamps = false;

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class, 'id_dispositivo');
    }
}
