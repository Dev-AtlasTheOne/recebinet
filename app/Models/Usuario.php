<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';

    protected $fillable = [

        'email',
        'senha',
        'nome',
        'cpf',
        'cep',
        'assinatura',

    ];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    public function pdfsEnviados(): HasMany
    {
        return $this->hasMany(Pdf::class, 'fk_usuario_envio');
    }

    public function pdfsRecebidos(): HasMany
    {
        return $this->hasMany(Pdf::class, 'fk_usuario_recebido');
    }

    use HasFactory;
}
