<?php

namespace App\Http\Controllers;


use App\Models\Usuario;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;


class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return $usuarios;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $request)
    {
        $nome = $request->input("nome_produto");
        $preco = $request->input("preco_produto");
        $desc = $request->input("description");
        $quant = $request->input("quantidade");
        $product = Usuario::create($request->all());
        return redirect()->route('home.index')->with('success','');
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
    public function update(UpdateUsuarioRequest $request, Usuario $usuario)
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
