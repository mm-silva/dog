<?php

namespace App\Http\Controllers\Fichas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Fichas;
use App\Models\Pet;
use App\Models\Agendado;
use App\Models\Agendamentos;
use App\Models\Dono;
use Carbon\Carbon;



class FichaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ficha = \DB::Select("Select p.id_pet ,p.foto_pet,
         p.nome_pet, p.idade_pet, p.peso,p.tipo, p.primeira_visita,
         p.ultima_visita,d.nome from pet p inner join  dono d on 
         p.id_dono = d.id_dono;");
        
        return view("admin.fichas.fichas")->with('ficha',$ficha);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.fichas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "pet_nome" => "required",
            "pet_peso" => "required",
            "pet_idade" => "required",
            "tipo" => "required",
            "raça" => "required",
            "nome_dono" => "required",
            "telefone" => "required"
        ]);

    if ($validator->fails()) {
        return redirect('fichas/create')
                    ->withErrors($validator)
                    ->withInput();
    }else{
           // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
 
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
         
        // Define um aleatório para o arquivo baseado no timestamps atual
        $date = date('HisYmd');
 
        // Recupera a extensão do arquivo
        $extension = $request->imagem->extension();
        $pet = Str::slug($request->nome_pet, '-');
        // Define finalmente o nome
        $nameFile = $pet.$date.".{$extension}";
 
        // Faz o upload:
        $upload = $request->imagem->storeAs('public/pets', $nameFile);
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
 
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
 
    }

    $dono =[ "nome" => $request->nome_dono,
             "telefone" => $request->telefone,
             "endereco" => $request->endereco,];
             Dono::create($dono);
             $x = Dono::where("nome" , $request->nome_dono)->get();
    $create = [
                "nome_pet" => $request->pet_nome,
                "peso" => $request->pet_peso,
                "idade_pet" => $request->pet_idade,
                "tipo" => $request->tipo,
                "raca" => $request->raça,
                "primeira_visita" => Carbon::now(),
                "ultima_visita" => Carbon::now(),
                "foto_pet" => "/pets/$nameFile",
                "id_dono" => $x[0]->id_dono
            ];
     
             Pet::create($create);

    return redirect("/fichas")->with("success","Ficha Cadastrada com sucesso!");
    }
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ficha = \DB::Select("Select p.foto_pet,p.nome_pet, p.idade_pet, p.peso,p.tipo, p.raca, p.primeira_visita,
     p.ultima_visita,d.nome, d.telefone, d.endereco from pet p inner join  dono d on p.id_dono = d.id_dono 
      where p.id_pet = $id;");
      $ficha = $ficha[0];
      $ficha->primeira_visita = Carbon::parse($ficha->primeira_visita)->format('d/m/Y h:i');
      $ficha->ultima_visita = Carbon::parse($ficha->ultima_visita)->format('d/m/Y h:i');
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
        $ficha = \DB::Select("Select p.id_pet, p.foto_pet,p.nome_pet, p.idade_pet, p.peso,p.tipo, p.raca, p.primeira_visita,
        p.ultima_visita,d.nome, d.telefone, d.endereco from pet p inner join  dono d on p.id_dono = d.id_dono 
         where p.id_pet = $id;");
         $ficha = $ficha[0];
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
        $validator = Validator::make($request->all(), [
            "pet_nome" => "required",
            "pet_peso" => "required",
            "pet_idade" => "required",
            "tipo" => "required",
            "raça" => "required",
            "nome_dono" => "required",
            "telefone" => "required"
        ]);

    if ($validator->fails()) {
        return redirect('fichas/create')
                    ->withErrors($validator)
                    ->withInput();
    }else{
           // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
 
    // Verifica se informou o arquivo e se é válido
    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
         
        // Define um aleatório para o arquivo baseado no timestamps atual
        $date = date('HisYmd');
 
        // Recupera a extensão do arquivo
        $extension = $request->imagem->extension();
        $pet = Str::slug($request->nome_pet, '-');
        // Define finalmente o nome
        $nameFile = $pet.$date.".{$extension}";
 
        // Faz o upload:
        $upload = $request->imagem->storeAs('public/pets', $nameFile);
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
 
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
 
    }

    $dono =[ "nome" => $request->nome_dono,
             "telefone" => $request->telefone,
             "endereco" => $request->endereco];

        $pet = Pet::where("id_pet",$id)->get()[0];
         
        Dono::where("id_dono" , $pet->id_dono)->update($dono);

       $update = [
        "nome_pet" => $request->pet_nome,
        "peso" => $request->pet_peso,
        "idade_pet" => $request->pet_idade,
        "tipo" => $request->tipo,
        "raca" => $request->raça,
        "id_dono" => $pet->id_dono
    ];
    ($request->imagem ? $update[ "foto_pet"] = "/pets/$nameFile" : '');
     Pet::where("id_dono" , $pet->id_dono)->update($update);

    return redirect("/fichas")->with("success","Ficha Cadastrada com sucesso!");
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $pet = Agendado::select('id_agendamento')->where("id_pet",$id)->get();
       foreach($pet as $key){
        Agendado::where("id_agendamento",$key->id_agendamento)->delete();
        Agendamentos::where("id_agendamento",$key->id_agendamento)->delete();
      
       } 
      
        Pet::where("id_pet",$id)->delete();
        return redirect("/fichas");
    }
    public function images($filename)
    {
        $url = Storage::url("pets/$filename");
        return Storage::url('');
    }

}
