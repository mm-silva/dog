<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicos;
use App\Models\Agendamentos;
use App\Models\Agendado;

class ServicoController extends Controller
{

  


    public function index(Request $request)
    {
        $servicos = Servicos::all();
        return response()->json($servicos);
    
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
        
            $servico = $request->all();
            $valor = str_replace(".","",$request->valor); 
            $valor = str_replace(",",".",$valor);
            $servico['valor'] = $valor;
            Servicos::create($servico);
            // return "ok";
            // $servico = $request->id;
            // Servicos::where("id", $servico)->delete();
            // return "ok";
            
            return response()->json("Serviço criado com sucesso!!!");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "aqui";
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
        $agen = Agendamentos::select('id_agendamento')->where("id_servico", $id)->get();
        
        foreach($agen as $key){
            Agendado::where('id_agendamento',$key->id_agendamento)->delete();
        }
        Agendamentos::where("id_servico", $id)->delete();
        Servicos::where("id_servico", $id)->delete();
       $servicos = Servicos::all();
       return response()->json($servicos);
  
    }
}
