<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdfRequest;
use App\Models\Pdf;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function index()
    {
        $pdfsEnviados = auth()->user()->pdfsEnviados()->with('usuario_recebido')->get();
        $pdfsRecebidos = auth()->user()->pdfsRecebidos()->with('usuario_envio')->get();

        return view('Workstation', compact('pdfsEnviados', 'pdfsRecebidos'));

    }

    public function store(PdfRequest $request)
    {

        $data = $request->validated();

        $usuarioRecebedor = Usuario::where('cpf', $request->cpf)->first();

        if (! $usuarioRecebedor) {
            return back()->withErrors([
                'cpf' => 'Usuário não encontrado',
            ]);
        }

        Pdf::create([
            'titulo' => $data['titulo'],
            'path' => $request->file('pdf')->store('pdfs'),
            'fk_usuario_envio' => Auth::id(),
            'fk_usuario_recebido' => $usuarioRecebedor->id,
        ]);

        return redirect()
            ->route('workstation.index')
            ->with('sucesso', 'PDF enviado com sucesso');
    }
}
