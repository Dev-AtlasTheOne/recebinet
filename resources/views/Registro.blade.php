@extends('layouts.LogReg')

@section('title', 'Registro')

@section('conteudo')



    <div class="bg-slate-100 shadow-2xl shadow-black p-2.5 ">
        <form action="{{ route('user.store') }}" method="POST" class="flex flex-col">
            @csrf

            <label for="email">Email</label>
            <x-campo-texto required type="text" name="email" placeholder="Email" />
            <label for="senha">Senha</label>
            <x-campo-texto required type="text" name="senha" placeholder="Senha" />
            <label for="senha">Nome</label>
            <x-campo-texto required type="text" name="nome" placeholder="Nome" />
            <label for="senha">CPF</label>
            <x-campo-texto required type="text" name="cpf" placeholder="CPF" />
            <label for="senha">CEP</label>
            <x-campo-texto required type="text" name="cep" placeholder="CEP" />
            <x-button class="bg-white mt-2">Enviar</x-button>

        </form>
    </div>








@section('scripts')

@endsection
