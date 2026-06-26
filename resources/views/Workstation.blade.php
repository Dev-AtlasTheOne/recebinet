@extends('layouts.Main')

@section('title', 'Workstation')

@section('conteudo')
    <div class="w-[99%] h-full flex justify-between  items-center gap-0.5">
        <div class="w-[90%] h-[90%] bg-white border border-black">
            <h1 class="w-full flex justify-center p-2 bg-blue-500 text-white font-extrabold text-3xl">PDFs enviados</h1>
            <table class="min-w-full divide-y divide-table-line">
                <thead>
                    <tr>
                        <th scope="col">titulo</th>
                        <th>status</th>
                        <th>Usuário destinatário</th>
                        <th>Para:</th>
                        <th>Assinatura</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-table-line ">

                    @forelse ($pdfsEnviados as $pdf)
                        <tr>
                            <td scope="col" class="text-center pb-3 pt-3">{{ $pdf->titulo }}</td>
                            <td scope="col" class="text-center m-1">{{ $pdf->status }}</td>
                            <td scope="col" class="text-center m-1">{{ $pdf->usuarioRecebido->nome }}</td>
                            <td scope="col" class="text-center m-1">{{ $pdf->usuarioRecebido->cidade }}</td>
                            @if ($pdf->status == 'Recebido')
                                <td scope="col" class="text-center">{{ $pdf->usuarioRecebido->assinatura }}</td>
                            @else
                                <td scope="col" class="text-center">-</td>
                            @endif
                            <td scope="col" class="text-center">
                                <form action="{{ route('pdf.view', $pdf->id) }}" method="POST">
                                    @csrf

                                    <x-button class="text-white">Visualizar</x-button>

                                </form>
                            </td>



                        </tr>
                    @empty
                    @endforelse
                </tbody>



            </table>

        </div>




        <div class="w-[90%] h-[90%] bg-white border border-black">
            <h1 class="w-full flex justify-center p-2 bg-blue-500 text-white font-extrabold text-3xl">PDFs recebidos</h1>
            <table class="min-w-full divide-y divide-table-line">
                <thead>
                    <tr>
                        <th scope="col">titulo</th>
                        <th>status</th>
                        <th>Usuário remetente</th>
                        <th>de:</th>
                        <th>Recebimento</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-table-line ">

                    @forelse ($pdfsRecebidos as $pdf)
                        <tr>
                            <td scope="col" class="text-center pb-3 pt-3">{{ $pdf->titulo }}</td>
                            <td scope="col" class="text-center">{{ $pdf->status }}</td>
                            <td scope="col" class="text-center">{{ $pdf->usuarioRecebido->nome }}</td>
                            <td scope="col" class="text-center">{{ $pdf->usuarioRecebido->cidade }}</td>
                            @if ($pdf->status != 'Recebido')
                                <td scope="col" class="text-center">
                                    <form action="{{ route('pdf.receive', $pdf->id) }}" method="POST">
                                        @csrf

                                        <x-button class="text-white">Receber</x-button>

                                    </form>
                                </td>
                            @else
                                <td>
                                    <h1>Recebido!</h1>
                                </td>
                            @endif
                            <td scope="col" class="text-center">
                                <form action="{{ route('pdf.view', $pdf->id) }}" method="POST">
                                    @csrf

                                    <x-button class="text-white">Visualizar</x-button>

                                </form>
                            </td>



                        </tr>
                    @empty
                    @endforelse
                </tbody>



            </table>
        </div>

    </div>

    <div class="w-[90%] h-[10%] flex justify-start items-center">
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
    </script>
@endpush
