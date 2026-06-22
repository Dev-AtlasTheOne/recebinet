<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Usuario extends Model
{

    protected $fillable=[

        "email",
        "senha",
        "nome",
        "cpf",
        "cep"

    ];
    use HasFactory;
}
