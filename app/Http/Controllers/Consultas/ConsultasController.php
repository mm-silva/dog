<?php

namespace App\Http\Controllers\Consultas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Servicos;
use App\Models\Fichas;
use App\Models\Pet;
use Carbon\Carbon;



class ConsultasController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $ficha = Pet::all();
        $servico = Servicos::all();
        return view("admin.consultas.index")->with('ficha',$ficha)->with('servico', $servico);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return dd($request->all());

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $ficha = Fichas::find($id);

        return view("admin.fichas.show")->with("ficha",$ficha);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ficha = Fichas::find($id);
      return view("admin.fichas.edit")->with("ficha", $ficha);   
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
        $ficha = Fichas::find($id);
        $ficha->delete();
        return redirect("/fichas");
    }
    public function consultas()
    {
        $url = Storage::url("pets/$filename");
        return Storage::url('');
    }

}
