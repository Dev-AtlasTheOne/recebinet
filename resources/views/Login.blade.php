@extends('layouts.LogReg')

@section('title', 'Login')

@section('conteudo')

    <div class="bg-slate-100 shadow-2xl shadow-black p-2.5 ">
        <form action="{{ route('user.authenticate') }}" method="GET" class="flex flex-col">
            @csrf

            <label for="email">Email</label>
            <x-campo-texto required type="text" name="email" placeholder="email" />
            <label for="senha">Senha</label>
            <x-campo-texto required type="text" name="senha" placeholder="Senha" />
            <x-button class="bg-white mt-2">Enviar</x-button>

        </form>

    </div>





@section('scripts')

@endsection
