<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contribuicao;
use App\Eixo;
use App\Escolha;
use App\Prioridade;
use App\Proposta;
use App\User;
use Illuminate\Support\Facades\Log;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eixos = Eixo::orderBy('id', 'asc')->get();

        $contribuicoes = Contribuicao::whereVisivel(1)->take(6)->get();
        
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
        /*
        foreach ($request->all() as $key => $v) {
            if(is_int($key) && Proposta::find($key)){
                foreach($v as $vote){
                    $escolha[] = Escolha::create([
                        'prioridade_id' => $vote,
                        'ip' => \Request::ip()
                    ]);
                 }
            }
        }
        return $escolha;
        */
        foreach ($request->all() as $key => $v) {
            if(is_int($key) && Proposta::find($key)){
                DB::beginTransaction();

                try{
                    $i = 0;
                    foreach($v as $vote){ 
                        $escolha[$i] = [
                            'prioridade_id' => $vote,
                            'created_at' => 'now()',
                            'updated_at' => 'now()',
                            'ip' => \Request::ip(),
                        ];
                    $i++;
                    }
                    Escolha::insert($escolha);
                    DB::commit();
                    Session::flash('message', "Agradecemos seu voto!");
                    return Redirect::back();
                    
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('message', "Infelizmente não foi possível validar seu voto, tente novamente em alguns instantes!");
                    Session::flash('statusType', "vote");
                    return Redirect::back();
                    Log::error($e->getMessage());
                }
            }
        }
    }

    public function storeParticipe(Request $request)
    {   
        $messages = [
                'nome.required' => 'É necessário o seu nome',
                'nome.max'  => 'Podemos aceitar no máximo 255 caracteres no seu nome',
                'email.required' => 'É necessário o seu email',
                'telefone.required' => 'É necessário o seu telefone',
                'cidade.required' => 'É necessário a sua cidade',
            ];

        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'email' => 'required',
            'telefone' => 'required',
            'cidade' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect('/#sugestoes')
                        ->withErrors($validator)
                        ->withInput();
        }

        Contribuicao::create([
            'nome' => $request->nome ,
            'email' => $request->email ,
            'telefone' => $request->telefone ,
            'cidade' => $request->cidade ,
            'area' => $request->area ,
            'sugestao' => ($request->sugestao == "") ? ' ': $request->sugestao ,
            'visivel' => 0,
            'ordem' => '0',
        ]);

        Session::flash('message', "Muito obrigado pela sua sugestão!");
        Session::flash('statusType', "contribuicao");
        return Redirect::back();



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
