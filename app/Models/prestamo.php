<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['estudiante_id','libro_id','fecha_prestamo','fecha_devolucion'];
}
