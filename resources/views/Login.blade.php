@extends('layouts.LogReg')

@section('title', 'Login')

@section('conteudo')

    <form action="{{ route("login.store") }}" method="POST" class="pb-2 pt-2">
        @csrf

        <x-campo-texto required type="text" name="email" placeholder="nome"/>
        <x-campo-texto required type="text" name="senha" placeholder="preco"/>
        <x-button class="m-1">Enviar</x-button>

    </form>



@section('scripts')

@endsection
