<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return $usuarios;

    }

    public function enter()
    {
        return view('Login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Registro');
    }

    public function exit(Request $request)
    {

        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home.index')->with('successo', 'Usuário saiu');
    }

    public function Authenticate(LoginRequest $request)
    {

        // Validate the input
        $credentials = $request->validated();

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            // Regenerate session for security
            $request->session()->regenerate();

            // Redirect to intended page or home
            return redirect()->intended('home.index')->with('successo', 'Usuário logado');
        }

        // If login fails, redirect back with error
        return back()
            ->withErrors(['email' => 'The provided credentials do not match our records.'])
            ->onlyInput('email');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegistroRequest $request)
    {
        $request->validated();

        $usuario = Usuario::create([
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'cep' => $request->cep,
            'assinatura' => "$request->nome $request->cpf",

        ]);

        Auth::login($usuario);

        return redirect()->route('home.index')->with('sucesso', 'Usuário registrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->back();
    }
}
