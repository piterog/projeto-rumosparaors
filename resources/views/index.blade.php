@extends('layouts.base')

@section('body')
    
    <section class='video'>
        <video autoplay muted>
            <source src="/video/RUMOS.mp4" type="video/mp4">
            <source src="/video/RUMOS.mov" type="video/mp4">
            Browser não suporta mov
        </video>
    </section>

    <section class='sobre'>
        <h2>O QUE É</h2>
        <p>Conheça as propostas e marque até 10 em cada eixo que você considera prioritária para que o Rio Grande avance e
volte a ser protagonista nacional.</p>
        <div class='block block-50'>
            <h3>Etapas</h3>
            <p>
                Entre os maio e junho de 2018, foram desenvolvidos cinco encontros
                temáticos nas áreas de gestão e finanças, desenvolvimento, educação,
                segurança pública e saúde. Em cada segmento, especialistas
                compartilharam suas experiências, os principais dados e indicadores do
                Estado passaram por análise minuciosa e se construiu uma série de
                propostas.
            </p>
        </div>
        <div class='block block-50'>
            <h3>Objetivo da plataforma</h3>
            <p>
                Com esta plataforma online queremos identificar as prioridades e
                colher mais alternativas para o futuro do Rio Grande do Sul.
            </p>
        </div>
        <div class='slider'></div>
        <div class='block'>
            <h3>Quem apoia o Rumos</h3>
            <img src="/img/apoio/astrogildo.png">
            <img src="/img/apoio/ftn.png">
            <img src="/img/apoio/solon.png">
            <img src="/img/apoio/teotonia.png">
        </div>
    </section>

    <section class='eixos'>
        <h2>Eixos</h2>
        <p>O Movimento Rumos destaca cinco eixos fundamentais para colocar o Rio Grande novamente no caminho certo.</p>
    </section>

    <section class='propostas'>
        <h2>Propostas e Prioridades</h2>
        <p>Conheça as propostas e marque até 10 em cada eixo que você considera prioritária para que o Rio Grande
avance e volte a ser protagonista nacional. </p>

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
    </section>

    {{-- --------------------------------------------------------------------------------------------- --}}
    {{-- --------------------------- FORMULÁRIO PRONTO, FALTA ESTILIZAR ------------------------------ --}}
    {{-- --------------------------------------------------------------------------------------------- --}}
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

    <section action="storeParticipe" class='participe'>
        <h2>Participe</h2>
        <p>Este é o seu espaço. Contribua com o Movimento Rumos e envie suas propostas para construir um Rio Grande melhor!</p>
        <form action="storeParticipe" method="POST" >
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone(DDD)</label>
                <input type="text" name="telefone" class="form-control" id="telefone">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="cidade">
            </div>
            <div class="form-group">
                <label for="area">Área</label>
                <select name="area" class="form-control" id="area">
                  @forelse($eixos as $eixo)
                     <option value="{{ $eixo->id }}">Eixo {{ $eixo->descricao }}</option>
                  @empty
                  @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="sugestao">Sugestão</label>
                <textarea name="sugestao" class="form-control" id="sugestao" rows="3"></textarea>
            </div>
            <div class='form-group center'>
                <button type='submit'>Envie e ajude o RS</button>
            </div>
        </form>
    </section>

    <section class='contribuicoes'>
        <div class='block block-30 contribuicao'>
            <p>
                Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Etiam
                pretium at orci vitae ullamcorper.
                Nunc maximus vitae magna sit amet
                vehicula. Pellentesque facilisis sagittis
                lorem, tincidunt bibendum leo
                ullamcorper vitae. Nunc eu nisi nunc. 
            </p>
            <p>Nome, área</p>
        </div>
        <div class='block block-30 contribuicao'>
            <p>
                Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Etiam
                pretium at orci vitae ullamcorper.
            </p>
            <p>Nome, área</p>
        </div>
        <div class='block block-30 contribuicao'>
            <p>
                Lorem ipsum dolor sit amet,
                consectetur adipiscing elit. Etiam
                pretium at orci vitae ullamcorper.
                Nunc maximus vitae magna sit amet
                vehicula. Pellentesque facilisis sagittis
                lorem, tincidunt bibendum leo
                ullamcorper vitae. Nunc eu nisi nunc. 
            </p>
            <p>Nome, área</p>
        </div>
    </section>
    
@endsection