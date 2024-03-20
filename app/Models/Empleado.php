<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'names',
        'documento',
        'numdoc',
        'cargo',
        'fecha_ingreso',
        'fecha_fin',
        'nacionalidad',
        'ciudad',
        'direccion',
        'telefono',
        'email',
        'document_soport',
        'contrato_soport',
        'carta_soport',
        'otro_si_soport',
        'liquidaciones_soport'
    ];

}
