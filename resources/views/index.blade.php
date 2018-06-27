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
        <div class='eixo-itens'>
            <div class='item'>
                @forelse($eixos as $eixo)
                    <h3>{{ $eixo->descricao }}</h3>
                    @forelse($eixo->propostas as $proposta)
                        <h4>{{ $proposta->descricao }}</h4>
                    @empty
                    @endforelse
                @empty
                <p>Ainda não há nenhum eixo cadastrado</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class='propostas'>
        <h2>Propostas e Prioridades</h2>
        <p>Conheça as propostas e marque até 10 em cada eixo que você considera prioritária para que o Rio Grande
avance e volte a ser protagonista nacional. </p>
        
        <div class='eixo--item'>
            <h3>EIXO GESTÃO E FINANÇAS</h3>
            <div class='eixo--tipos'>
                <div class='eixo--tipo'>
                    <h3>Planejamento</h3>
                    <div class='form'>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="#id">
                          <label class="custom-control-label" for="#id">Aprimorar a metodologia utilizada de Planejamento
Estratégico</label>
                        </div>
                    </div>
                    <div class='form'>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="#id">
                          <label class="custom-control-label" for="#id">Realizar desdobramento do Planejamento de Governo
alinhado aos Planos Estratégicos de desenvolvimento
2015-2030 (Coredes)</label>
                        </div>
                    </div>
                </div>
                <div class='eixo--tipo'>
                    <h3>Planejamento</h3>
                    <div class='form'>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="#id">
                          <label class="custom-control-label" for="#id">Proposta</label>
                        </div>
                    </div>
                </div>
                <div class='eixo--tipo'>
                    <h3>Planejamento</h3>
                    <div class='form'>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="#id">
                          <label class="custom-control-label" for="#id">Proposta</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class='participe'>
        <h2>Participe</h2>
        <p>Este é o seu espaço. Contribua com o Movimento Rumos e envie suas propostas para construir um Rio Grande melhor!</p>
        <form>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="telefone">Telefone(DDD)</label>
                <input type="text" class="form-control" id="telefone">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade">
            </div>
            <div class="form-group">
                <label for="area">Área</label>
                <select class="custom-select" id="area">
                  @forelse($eixos as $eixo)
                     <option>{{ $eixo->descricao }}</option>
                  @empty
                  @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="sugestao">Sugestão</label>
                <textarea class="form-control" id="sugestao" rows="3"></textarea>
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