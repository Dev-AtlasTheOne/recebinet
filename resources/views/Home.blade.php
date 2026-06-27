@extends('layouts.Main')

@section('title', 'Home')

@section('conteudo')


    @auth
        <h1 class="text-blue-500 font-bold text-9xl mt-10">Bem-Vindo!</h1>
        <h1 class="text-blue-500 font-bold text-5xl mt-10">{{ Auth::user()->nome }}</h1>
        <h1 class="text-blue-500 font-bold text-5xl mt-10">de</h1>
        <h1 class="text-blue-500 font-bold text-5xl mt-10">{{ Auth::user()->cidade }}</h1>
        <div class="mt-10 flex justify-between gap-10">

            <a href="{{ route('user.exit') }}"><x-button class="text-white">Sair</x-button></a>

        </div>
    @endauth
    @guest
        <h1 class="text-blue-500 font-bold text-9xl mt-10">Bem-Vindo!</h1>
        <h1 class="text-blue-500 font-bold text-5xl mt-10">O que deseja fazer?</h1>


        <div class="mt-10 flex justify-between gap-10">

            <a href="{{ route('login') }}"><x-button class="text-white">Entrar</x-button></a>
            <a href="{{ route('user.create') }}"><x-button class="text-white">Registrar</x-button></a>
        </div>
    @endguest

    <div class="mt-10 flex justify-between gap-10 w-[95%] h-[50%]">
        <x-card>
            <div class="w-full h-auto bg-blue-500 flex justify-center rounded-t">
                <h1 class="text-white font-bold">Função deste site</h1>

            </div>
            <div class="p-1 font-bold">
                <p>É o envio e recebimento de PDFs entre os usuários do sistema</p>
            </div>

        </x-card>

        <x-card>
            <div class="w-full h-auto bg-blue-500 flex justify-center rounded-t">
                <h1 class="text-white font-bold">Pra quem é esse site?</h1>

            </div>
            <div class="p-1 font-bold">
                <p>Para pessoas que precisam de confirmação oficial do recebimento dos seus documentos</p>
            </div>
        </x-card>

        <x-card>
            <div class="w-full h-auto bg-blue-500 flex justify-center rounded-t">
                <h1 class="text-white font-bold">Como funciona?</h1>

            </div>
            <div class="p-1 font-bold">
                <p>Apenas coloque o titulo, a pessoa que irá receber e o arquivo que vai mandar</p>
            </div>
        </x-card>
    </div>



@endsection

@section('scripts')

@endsection
