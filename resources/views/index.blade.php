@extends('layouts.base')

@section('body')
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

    <section class='video'>
        <video autoplay muted>
            <source src="/video/RUMOS.mp4" type="video/mp4">
            <source src="/video/RUMOS.mov" type="video/mp4">
            Browser não suporta mov
        </video>
    </section>

    <section class='sobre'>
        <h2>O QUE É</h2>
        <p>O Movimento Rumos quer mobilizar a sociedade gaúcha na busca pela recuperação do protagonismo do Estado no cenário nacional. O Rumos avalia o cenário estadual e, de forma plural e colaborativa, identifica como avançar e melhorar a situação do Rio Grande do Sul.  </p>
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
        <div class='eixo-itens'>
            @forelse($eixos as $eixo)
            <div class='item'>
                <div>
                    <h3>{{ $eixo->descricao }}</h3>
                    @forelse($eixo->propostas as $proposta)
                        <h4>{{ $proposta->descricao }}</h4>
                    @empty
                    @endforelse
                </div>
            </div>
                @empty
                <p>Ainda não há nenhum eixo cadastrado</p>
            @endforelse
        </div>
    </section>

    <section class='propostas'>
        <h2>Propostas e Prioridades</h2>
        <p>Conheça as propostas e marque até 10 em cada eixo que você considera prioritária para que o Rio Grande
avance e volte a ser protagonista nacional. </p>
        <form action="store" method="POST">
            {{ csrf_field() }}
            @forelse($eixos as $eixo)
            <div class='eixo--item'>
                <h3>EIXO {{ strtoupper($eixo->descricao)}}</h3>
                <div class='eixo--tipos'>
                @forelse($eixo->propostas as $proposta)
                    <div class='eixo--tipo'>
                        <h3>{{ $proposta->descricao }}</h3>
                        @forelse($proposta->prioridades as $prioridade )
                        <div class='form'>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name='{{ $proposta->id }}[]' class="custom-control-input" id="{{$prioridade->id}}" value='{{$prioridade->id}}'>
                              <label class="custom-control-label" for="{{$prioridade->id}}">{{ $prioridade->descricao }}</label>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                @empty
                @endforelse
                </div>
            </div>
            @empty
            @endforelse
            <div class="form-group center">
                <button type="submit" class="">Enviar</button>
            </div>
        </form>
    </section>
    <section class='participe'>
        <h2>Participe</h2>
        <p>Este é o seu espaço. Contribua com o Movimento Rumos e envie suas propostas para construir um Rio Grande melhor!</p>
        <form action="storeParticipe" method="POST" >
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                <label for="nome">Nome</label>
                {!! $errors->first('nome', '<span class="error-message">(:message)</span>') !!}
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
                <label for="telefone">Telefone(DDD)</label>
                <input type="text" name="telefone" class="form-control" id="telefone">
            </div>
            <div class="form-group {{ $errors->has('cidade') ? 'has-error' : ''}}">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" class="form-control" id="cidade">
            </div>
            <div class="form-group">
                <label for="area">Área</label>
                <select name="area" class="custom-select" id="area">
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