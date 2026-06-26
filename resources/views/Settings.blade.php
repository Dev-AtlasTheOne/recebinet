<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>
@extends('layouts.Main')

@section('title', 'Settings')

@section('conteudo')

    <h1 class="text-4xl mt-3">C O N F I G U R A Ç Õ E S</h1>
    <div class="flex flex-col h-full w-full p-10 justify-between">


        <form action="usuario.update" method="POST" class="flex flex-col">
            @csrf


            <label for="assinatura">Assinatura</label>
            <x-campo-texto required type="text" name="assinatura" placeholder="modificar assinatura" />
            <x-button class="text-white mt-1">Modificar</x-button>


        </form>

        <form action="usuario.destroy" method="POST" class="flex flex-col">
            @csrf


            <x-button class="text-white mt-1 bg-red-500">Deletar usuário</x-button>


        </form>


    </div>

@endsection

@section('scripts')

@endsection
