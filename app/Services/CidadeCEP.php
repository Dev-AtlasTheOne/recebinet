<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CidadeCEP
{
    public function buscarCep(string $cep)
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        return $response->json();
    }
}
