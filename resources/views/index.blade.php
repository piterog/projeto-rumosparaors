@extends('layouts.base')

@section('body')
    

    {{-- Com este código, tu consegue fazer a parte inicial, em que mostra cada eixo com sua proposta, só precisa estilizar --}}
    {{-- 
    @forelse($eixos as $eixo)
        <h1>{{ $eixo->descricao }}</h1>
        @forelse($eixo->propostas as $proposta)
            <p>{{ $proposta->descricao }}</p>
        @empty
            <p>Ainda não há nenhuma proposta cadastrada</p>
        @endforelse
    @empty
        <p>Ainda não há nenhum eixo cadastrado</p>
    @endforelse
    --}}
    {{-- ------------------------------------------------------------------------------------------------------------------ --}}


    <form action="store" method="POST">
        {{ csrf_field() }}
        @forelse($eixos as $eixo)
            <h1>Eixo {{ $eixo->descricao }}</h1>
            @forelse($eixo->propostas as $proposta)
                <p>{{ $proposta->descricao }}</p>
                <div style="border:1px solid red">
                    @forelse($proposta->prioridades as $prioridade )
                        <p><input type="checkbox" name="{{ $proposta->id }}[]" value="{{ $prioridade->id }}">{{ $prioridade->descricao }}</p>
                    @empty
                        <p>Ainda não há nenhuma prioridade cadastrada</p>
                    @endforelse
                </div>
                @empty
                <p>Ainda não há nenhuma proposta cadastrada</p>
            @endforelse
        @empty
            <p>Ainda não há nenhum eixo cadastrado</p>
        @endforelse

        <input type="submit" value="Enviar">
    </form>



@endsection