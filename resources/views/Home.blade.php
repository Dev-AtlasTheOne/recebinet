@extends('layouts.Main')

@section('title', 'Form')

@section('conteudo')

    <div class="w-full h-full bg-blue-500 flex justify-center items-center overflow-auto">

        <div class="w-[80%] h-[90%] mb-10 bg-slate-100 flex flex-col items-center shadow-black shadow-2xl">
            <h1 class="text-blue-500 font-bold text-9xl mt-10">Bem-Vindo!</h1>
            <h1 class="text-blue-500 font-bold text-5xl mt-10">O que deseja fazer?</h1>
            <div class="mt-10 flex justify-between gap-10">
                <x-button>Entrar </x-button>
                <x-button>Registrar </x-button>
            </div>

            <div class="mt-10 flex justify-between gap-10 w-[90%] h-[50%]">
                <x-card>
                    <div class="w-full h-auto bg-blue-500 flex justify-center rounded-t">
                        <h1 class="text-white font-bold">Função deste site</h1>
                    </div>

                </x-card>

                <x-card>
                    <div class="w-full h-auto bg-blue-500 flex justify-center rounded-t">
                        <h1 class="text-white font-bold">Pra quem é esse site?</h1>
                    </div>


                </x-card>

                <x-card>
                    <div class="w-full h-auto bg-blue-500 flex justify-center rounded-t">
                        <h1 class="text-white font-bold">Função deste site</h1>
                    </div>


                </x-card>
            </div>
        </div>
    </div>




@section('scripts')

@endsection
