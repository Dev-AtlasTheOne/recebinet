<?php

namespace App\Http\Controllers;


use App\Models\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

    public function Authenticate(Request $request)
    {




    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "senha" => "required|min:6",
            "nome" =>"required",
            "cpf" =>"required|cpf",
            "cep" =>"required|digits:8",



        ]);

        $usuario = Usuario::create([
            "email" => $request->email,
            "senha" => Hash::make($request->senha),
            "nome" => $request->nome,
            "cpf" => $request->cpf,
            "cep" => $request->cep,
            "assinatura" => "$request->nome $request->cpf",

        ]);

        Auth::login($usuario, true);

        return redirect()->route('home.index');
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
