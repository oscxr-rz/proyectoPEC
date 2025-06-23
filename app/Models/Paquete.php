<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $connection = 'mysql';
    protected $table = 'paquete';
    protected $primaryKey = 'id_paquete';
    protected $fillable = [
        'id_paquete',
        'peso_total',
        'descripcion',
        'id_venta'
    ];
    public $timestamps = false;

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'id_paquete');
    }

}
