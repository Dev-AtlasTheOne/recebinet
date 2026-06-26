@extends('layouts.Main')

@section('title', 'Workstation')

@section('conteudo')
    <div class="w-[90%] h-[90%] flex justify-between gap-5 items-center">
        <div class="w-[90%] h-[90%] bg-white">
            <h1 class="w-full flex justify-center p-2 bg-blue-500 text-white font-extrabold text-3xl">PDFs enviados</h1>
            <div class="flex  justify-between items-center p-1 border border-black">

                <h1>titulo</h1>
                <h1>status</h1>
                <h1>Usuário Remetente</h1>
                <h1>Assinatura</h1>
                <h1>Download</h1>
            </div>
            @foreach ($pdfsEnviados as $pdf)
                <div class="flex  justify-between items-center p-1 border border-black">
                    <h1>{{ $pdf->titulo }}</h1>
                    <h1>{{ $pdf->status }}</h1>
                    <h1>{{ $pdf->usuarioRecebido->nome }}</h1>
                    <a href=""><x-button class="text-white">Download</x-button></a>

                </div>
            @endforeach



        </div>
        <div class="w-[90%] h-[90%] bg-white ">
            <h1 class="w-full flex justify-center p-2 bg-blue-500 text-white font-extrabold text-3xl">PDFs recebidos</h1>
            <div class="flex  justify-between items-center p-1 border border-black">

                <h1>titulo</h1>
                <h1>status</h1>
                <h1>Usuário destinatário</h1>
                <h1>Recebimento</h1>
                <h1>Download</h1>


            </div>

            @foreach ($pdfsRecebidos as $pdf)
                <div class="flex  justify-between items-center p-1 border border-black">
                    <h1>{{ $pdf->titulo }}</h1>
                    <h1>{{ $pdf->status }}</h1>
                    <h1>{{ $pdf->usuarioRecebido->nome }}</h1>
                    <a href=""><x-button class="text-white">Receber</x-button></a>
                    <a href=""><x-button class="text-white">Download</x-button></a>

                </div>
            @endforeach



        </div>


    </div>

    <div class="w-[90%]">
        <x-button id="abrirModal" class="text-white">Enviar PDF</x-button></a>
    </div>
    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-2 mb-2 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <div id="modal" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center">

        <div class="bg-white p-6 w-[500px]">

            <h1 class="text-2xl font-bold mb-4">
                Enviar PDF
            </h1>

            <form action="{{ route('pdf.store') }}" method="POST" enctype="multipart/form-data"
                class="flex flex-col gap-1">
                @csrf


                <label for="titulo">Titulo</label>
                <x-campo-texto type="text" name="titulo" placeholder="Título" />

                <label for="cpf">CPF do destinatário</label>
                <x-campo-texto type="text" name="cpf" placeholder="Título" />


                <input type="file" name="pdf" class="p-1 m-1 bg-blue-500 text-white font-bold">

                <x-button type="submit" class="m-1 text-white">Enviar</x-button>
            </form>

            <x-button id="fecharModal" class="m-1 text-white">
                Fechar
            </x-button>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        const modal = document.getElementById('modal');

        document.getElementById('abrirModal').addEventListener('click', () => {
            modal.classList.remove('hidden');
        });

        document.getElementById('fecharModal').addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        @if ($errors->any())
            document.addEventListener("DOMContentLoaded", () => {
                modal.classList.remove('hidden');
            });
        @endif
    </script>
@endpush
