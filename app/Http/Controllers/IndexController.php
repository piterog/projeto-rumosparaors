<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuicao;
use App\Eixo;
use App\Escolha;
use App\Prioridade;
use App\Proposta;
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eixos = Eixo::all();

        $contribuicoes = Contribuicao::whereVisivel(1)->get();
        
        //return $eixos[0]->propostas[0]->prioridades;
        return view('index', compact('eixos', 'contribuicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $key => $v) {
            if(is_int($key) && Proposta::find($key)){
                foreach($v as $vote){{ 
                    $escolha[] = Escolha::create([
                        'prioridade_id' => $vote,
                        'ip' => \Request::ip()
                    ]);
                 }}
            }
        }

        return $escolha;

    }

    public function storeParticipe(Request $request)
    {   

        return Contribuicao::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
