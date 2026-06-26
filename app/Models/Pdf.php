<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pdf extends Model
{
    protected $table = 'pdf';

    protected $fillable = [
        'fk_usuario_envio',
        'fk_usuario_recebido',
        'titulo',
        'status',
        'path',
        'data_envio',
        'data_recebido',
    ];

    protected $casts = [
        'data_envio' => 'datetime',
        'data_recebido' => 'datetime',
    ];

    public function usuarioEnvio(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario_envio');
    }

    public function usuarioRecebido(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'fk_usuario_recebido');
    }
}
