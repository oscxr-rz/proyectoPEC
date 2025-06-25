<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $connection = 'mysql';
    protected $table = 'venta';
    protected $primaryKey = 'id_venta';
    protected $fillable = [
        'precio_total',
        'metodo_pago',
        'fecha_venta',
        'id_centro_acopio'
    ];

    public $timestamps = false;

    public function paquete()
    {
        return $this->hasOne(Paquete::class, 'id_venta');
    }
}
