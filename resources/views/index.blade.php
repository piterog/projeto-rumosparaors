@extends('layouts.base')

@section('body')
    

    {{-- Com este código, tu consegue fazer a parte inicial, em que mostra cada eixo com sua proposta, só precisa estilizar --}}
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
    {{-- ------------------------------------------------------------------------------------------------------------------ --}}


    




@endsection