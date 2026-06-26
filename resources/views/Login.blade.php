@extends('layouts.LogReg')

@section('title', 'Login')

@section('conteudo')

    <div class="bg-slate-100 shadow-2xl shadow-black p-2.5 ">
        @if ($errors->any())
            <div class="bg-red-700 ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.authenticate') }}" method="POST" class="flex flex-col">
            @csrf


            <label for="email">Email</label>
            <x-campo-texto required type="text" name="email" placeholder="email" />
            <label for="senha">Senha</label>
            <x-campo-texto required type="password" name="senha" placeholder="Senha" />
            <x-button class="bg-white mt-2">Enviar</x-button>

        </form>

    </div>



@endsection

@push('scripts')
@endpush
