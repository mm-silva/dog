@extends('adminlte::page')

@section('title', "| $ficha->nome_pet")



@section('content')


    
        <!-- Main content -->
        <section class="content">
    
          <!-- Default box -->
          <div class="card">
         
            <div class="card-body">
          <div class="container">
              <div class="row">
                  
                <div class="col-12 text-center">
                        <div class="col-6 mx-auto" height="300px">
                        <img src="{{Storage::url($ficha->foto_pet)}}" class="border" height="150px">
                        <br>
                    </div>
                  </div>
            </div>
            <br>
              <div class="row align-self-center">

                      <div class="col-4 text-center">
                            <h5 class="text-center">Nome:</h5>
                            {{$ficha->nome_pet}}
                          </div>
                    <div class="col-4 text-center">
                            <h5 class="text-center">Tipo:</h5>
                    {{$ficha->tipo}}
                  </div>

                  <div class="col-4 text-center">
                        <h5 class="text-center">Raça:</h5>
                    {{$ficha->raca}}
                  </div>
 
                    </div>
                    <br>
                    <div class="row align-self-center">
                            <div class="col-4 text-center">
                                    <h5 class="text-center">Idade:</h5>
                                    {{$ficha->idade_pet}}
                                </div>
                            <div class="col-4 text-center">
                                    <h5 class="text-center">Peso:</h5>
                                    {{$ficha->peso}}
                                </div>
                                    <div class="col-4 text-center">
                                           <h5 class="text-center">Nome do Dono(a):</h5>
                                           {{$ficha->nome}}
                                 </div>
      
                               </div>
                               <br>
                   
                        <div class="row align-self-center">
                                <div class="col-4 text-center">
                                        <h5 class="text-center">Telefone:</h5>
                                    {{$ficha->telefone}}
                                    </div>  
                                    <div class="col-4 text-center">
                                            <h5 class="text-center">Endereco:</h5>
                                            {{$ficha->endereco}}
                                        </div>
                                        <div class="col-4 text-center">
                                                <h5 class="text-center">Primeira visita:</h5>
                                                {{$ficha->primeira_visita}}
                                            </div>
                     </div>
                                 
                     <br>
                     <div class="row align-self-center">
                        
                                <div class="col-4 text-center">
                                        <h5 class="text-center">Ultima visita:</h5>
                                        {{$ficha->ultima_visita}}
                                    </div>
                          
                               
                 </div>
                        
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            <a href="{{route("fichas.index")}}" class="btn btn-info">Voltar</a>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
    
        </section>
        <!-- /.content -->

@stop