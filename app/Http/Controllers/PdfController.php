<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdfRequest;
use App\Models\Pdf;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function view(Pdf $pdf)
    {

        return response()->file(
            storage_path('app/public/'.$pdf->path)
        );
    }

    public function index()
    {
        $pdfsEnviados = auth()->user()->pdfsEnviados()->with('usuarioRecebido')->get();
        $pdfsRecebidos = auth()->user()->pdfsRecebidos()->with('usuarioEnvio')->get();

        return view('Workstation', compact('pdfsEnviados', 'pdfsRecebidos'));

    }

    public function store(PdfRequest $request)
    {

        $data = $request->validated();

        $path = $request->file('pdf')->store('pdfs', 'public');

        $usuarioRecebedor = Usuario::where('cpf', $request->cpf)->first();

        if (! $usuarioRecebedor) {
            return back()->withErrors([
                'cpf' => 'Usuário não encontrado',
            ]);
        }

        Pdf::create([
            'titulo' => $data['titulo'],
            'path' => $path,
            'fk_usuario_envio' => Auth::id(),
            'fk_usuario_recebido' => $usuarioRecebedor->id,
        ]);

        return redirect()
            ->route('workstation.index')
            ->with('sucesso', 'PDF enviado com sucesso');
    }

    public function receive(Pdf $pdf)
    {

        if ($pdf->fk_usuario_recebido !== Auth::id()) {
            abort(403);
        }

        $pdf->update([
            'status' => 'Recebido',
            'data_recebido' => now(),
            'assinatura' => Auth::user()->assinatura,
        ]);

        return back()->with('sucesso', 'PDF recebido com sucesso');
    }
}
