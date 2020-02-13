<?php

namespace App\Http\Controllers\Servicos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicos;

class ServicoController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexView()
    {
        return view("admin.servicos.index");
    } 
   

    public function index(Request $request)
    {
        if($request->isMethod('get')){                 
        $servicos = Servicos::all();
        return response()->json($servicos);
        }else{
            return "i'm not a post method";
        }
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
            Servicos::create($servico);
            return "ok";
            // $servico = $request->id;
            // Servicos::where("id", $servico)->delete();
            // return "ok";
                   
       
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
       Servicos::where("id_servico", $id)->delete();
       $servicos = Servicos::all();
       return response()->json($servicos);
  
    }

}
