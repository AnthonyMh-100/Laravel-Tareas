<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable =[

        'id_user',
        'tarea',
        'archivo',
        'comentario',
        'fecha',

    ];

    public $timestamps = false;

}
