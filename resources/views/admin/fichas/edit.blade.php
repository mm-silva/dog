@extends('adminlte::page')
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

@section('title', '| Editando')




@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Editando</h3>

    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{route('fichas.update',$ficha->id_pet)}}" enctype="multipart/form-data">
    <!-- /.card-header -->
    <div class="card-body">
      @csrf
      @method("PATCH")
                <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label>Foto</label>
                              <input type="file" name="imagem" class="form-control" id="exampleFormControlFile1">  
                        </div>
                        <div class="form-group">
                             <label>Nome</label>
                             <input type="text" value="{{$ficha->nome_pet}}" maxlength="35" name="pet_nome" class="form-control">
                          </div>
                        <div class="form-group">
                            <label>Peso</label>
                            <input type="number" value="{{$ficha->peso}}" name="pet_peso" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nome do Dono(a)</label>
                           <input type="text" value="{{$ficha->nome}}" name="nome_dono" class="form-control">
                        </div>
                          <div class="form-group">
                          <label>Telefone</label>
                           <input type="text" value="{{$ficha->telefone}}" name="telefone" onkeydown="mascara( this )" onkeyup="mascara( this )" id="telefone" class="form-control">
                         </div>
                  </div>
                <div class="col">
                <div class="form-group">
                  <label>Idade</label>
                  <input type="number" value="{{$ficha->idade_pet}}" min="1"  name="pet_idade" class="form-control">
                </div>
                <div class="form-group">
                     <label>Tipo</label>
                     <select name="tipo" class="form-control">
                      <option value="Cão">Cão</option>
                      <option value="Gato">Gato</option>
                      <option value="Outros">Outros</option>
                    </select>
                  
                  
                    </div>
                <div class="form-group">
                    <label>Raça</label>
                    <input type="text" value="{{$ficha->raca}}" name="raça" class="form-control">
                </div>
                <div class="form-group">
                    <label>Endereco</label>
                   <input type="text" value="{{$ficha->endereco}}" name="endereco" class="form-control">
                </div>
                  </div>
                </div>
              
      
            <!-- input states -->
         
        <!-- /.card-body -->
        <button type="submit" class="btn btn-success float-right">Editar</button>
      </form>
  
@stop
<script>
    stop = '';
    function mascara( campo ) {
            campo.value = campo.value.replace( /[^\d]/g, '' )
                                     .replace( /^(\d\d)(\d)/, '($1) $2' )
                                     .replace( /(\d{5})(\d)/, '$1-$2' );
            if ( campo.value.length > 15 ) campo.value = stop;
            else stop = campo.value;    
    }
    </script>