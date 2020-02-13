@extends('adminlte::page')

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>


@section('title', '| Fichas')



@section('content')
@include("admin.fichas.alert")
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Fichas</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" id="myInput" name="table_search" class="form-control float-right" placeholder="Pesquisar">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 450px;">
        <table id="myTable" class="table table-head-fixed">
                
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nome</th>
              <th>Idade</th>
              <th>Peso</th>
              <th>Tipo</th>
              <th>Dono(a)</th>
              <th>Ultima Vez</th>
              <th>Edite/Detalhe/Delete</th>
            </tr>
          </thead>
          <tbody>
              @foreach($ficha as $row => $value)
            <tr>
              <td> 
                <img src="{{Storage::url($value->foto_pet)}}" class="img-fluid mb-2" height="100px" width="100px">

                </td>
              <td class="align-middle">{{$value->nome_pet}}</td>
              <td class="align-middle">{{($value->idade_pet < 1 ? "$value->idade_pet meses" : "$value->idade_pet anos")}}</td>
              <td class="align-middle">{{($value->peso < 1 ? "$value->peso g" : "$value->peso kg" )}}</td>
              <td class="align-middle">{{$value->tipo}}</td>
              <td class="align-middle">{{$value->nome}}</td>
              <td class="align-middle">{{ date('d/m/Y', strtotime($value->ultima_visita))}}</td>
              <td class="align-middle">
              <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{route("fichas.edit",$value->id_pet)}}" ><button class="btn btn-warning"><i class="fas fa-pencil-alt text-white"></i></button></a>
                <a href="{{route("fichas.show",$value->id_pet)}}"> <button class="btn btn-info"><i class="fas fa-eye text-white"></i></button></a>
             <form action="{{route("fichas.destroy",$value->id_pet)}}" method="POST">
              @csrf
              @method("DELETE")   
                <button type=submit" class="btn btn-danger"><i class="fas fa-trash-alt text-white"></i></button>
             </form>
              </div>
             </td>
               </tr>
            <tr>
               @endforeach
                
              
          </tbody>
        </table>
        
      </div>
      <!-- /.card-body -->
    </div>
  <a href="{{route("fichas.create")}}" class="btn btn-success font-weight-bold">Criar</a>
        <!-- /.card -->
  </div>
  <br>
@stop
<script>
  
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});  
  
</script>