@extends('layouts.base')

@section('body')


@if (Session::has('message'))
    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            @if(Session::get('status') == 204)
                <p class="text-danger text-uppercase font-weight-bold">{{ Session::get('message') }}</p>
            @else
            <p class="text-success text-uppercase font-weight-bold">{{ Session::get('message') }}</p>
            <br><br>
            <div class='block block-100'>
                    <form action="storeCadastro" method="POST" >
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
                                <label for="nome">Nome</label>
                                {!! $errors->first('nome', '<span class="error-message">(:message)</span>') !!}
                                <input type="text" name="nome" class="form-control" id="nome">
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                                <label for="email">Email</label>
                                {!! $errors->first('email', '<span class="error-message">(:message)</span>') !!}
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
                                <label for="telefone">Telefone(DDD)</label>
                                {!! $errors->first('telefone', '<span class="error-message">(:message)</span>') !!}
                                <input type="text" name="telefone" class="form-control" id="telefone">
                            </div>
                            <div class="text-center">
                                <button type="button" id="sendForm" onclick="test()" class="btn btn-success">Cadastrar</button>
                            </div>
                    </form>
                </div>
          @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
    <script>
        window.onload = function() {
            $('.modal').modal();
        };
    </script>
@endif

    <section class='video'>
        <video autoplay muted playsinline>
            <source src="/video/RUMOS.mp4" type="video/mp4" type="video/mp4">
            <source src="/video/RUMOS.mov" type="video/mp4">
            <source src="/video/RUMOS.webmhd.webm" type="video/webm; codecs=vp8,vorbis">
            <source src="/video/RUMOS.oggtheora.ogv" type="video/ogg; codecs=theora,vorbis">
            <source src="/video/RUMOS.iphone5.mp4">
            Browser não suporta mov
        </video>
    </section>

    <section class='sobre'>
        <h2>O QUE É</h2>
        <p>O Movimento Rumos quer mobilizar a sociedade gaúcha na busca pela recuperação do protagonismo do Estado no cenário nacional. O Rumos avalia o cenário estadual e, de forma plural e colaborativa, identifica como avançar e melhorar a situação do Rio Grande do Sul.  </p>
        <div class='block block-100'>
            <h3>Etapas</h3>
            <p>
                Nos meses de maio e junho de 2018, foram desenvolvidos cinco encontros temáticos nas áreas de Gestão e Finanças, 
                Desenvolvimento, Educação, Segurança Pública e Saúde. Em cada segmento, especialistas compartilharam suas experiências. 
                Os principais dados e indicadores do Estado passaram por análise minuciosa e se construiu uma série de propostas.
            </p>
            <h3>Objetivo da plataforma</h3>
            <p>
                Com esta plataforma online queremos identificar as prioridades e
                colher mais alternativas para o futuro do Rio Grande do Sul.
            </p>
        </div>
        <div class='slider'>
            <!-- <a data-flickr-embed="true"  href="https://www.flickr.com/photos/151944326@N03/albums/72157693306974412" title="03/05/2018 - Lançamento do movimento RumoS no Fundação Iberê Camargo"><img src="https://farm1.staticflickr.com/951/40079955470_8cb8bc9d65_z.jpg" width="580" height="300" alt="03/05/2018 - Lançamento do movimento RumoS no Fundação Iberê Camargo"></a><script async src="//embedr.flickr.com/assets/client-code.js" charset="utf-8"></script> -->
        </div>
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
        <p>Em cada eixo, marque até 10 propostas que você considera prioritárias para que o Rio Grande avance e volte a ser protagonista nacional</p>
        <form name='store' action="store" method="POST">
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
                              <label class="custom-control-label" data-target="{{str_slug($eixo->descricao)}}" for="{{$prioridade->id}}">{{ $prioridade->descricao }}</label>
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
                <button type="button" id="sendForm" onclick='test()' class="">Enviar</button>
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
                {!! $errors->first('email', '<span class="error-message">(:message)</span>') !!}
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="form-group {{ $errors->has('telefone') ? 'has-error' : ''}}">
                <label for="telefone">Telefone(DDD)</label>
                {!! $errors->first('telefone', '<span class="error-message">(:message)</span>') !!}
                <input type="text" name="telefone" class="form-control" id="telefone">
            </div>
            <div class="form-group {{ $errors->has('cidade') ? 'has-error' : ''}}">
                <label for="cidade">Cidade</label>
                {!! $errors->first('cidade', '<span class="error-message">(:message)</span>') !!}
                <input type="text" name="cidade" class="form-control" id="cidade">
            </div>
            <div class="form-group">
                <label for="area">Área</label>
                <select name="area" class="custom-select" id="area">
                  @forelse($eixos as $eixo)
                     <option value="{{ $eixo->id }}">EIXO {{ $eixo->descricao }}</option>
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
    @if(count($contribuicoes) > 0)
        <section class='contribuicoes'>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                    @php
                        $max = (count($contribuicoes) < 3) ? count($contribuicoes) : 3;
                    @endphp
                        @for ($i = 0; $i < $max; $i++)
                            <div class='block block-30 contribuicao'>
                                <p>{{ $contribuicoes[$i]->sugestao }}</p>
                                <p class="contribuicao-pessoa">{{ $contribuicoes[$i]->nome}}, {{ $contribuicoes[$i]->cidade}}</p>
                            </div>
                        @endfor
                    </div>
                    @if(count($contribuicoes) >3)
                        <div class="swiper-slide">
                            @for ($i = 3; $i < count($contribuicoes); $i++)
                                <div class='block block-30 contribuicao'>
                                    <p>{{ $contribuicoes[$i]->sugestao }}</p>
                                    <p class="contribuicao-pessoa">{{ $contribuicoes[$i]->nome}}, {{ $contribuicoes[$i]->cidade}}</p>
                                </div>
                            @endfor
                        </div>
                    @endif
                </div>
                <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

@endsection
