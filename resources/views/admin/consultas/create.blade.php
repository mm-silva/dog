@extends('adminlte::page')

@section('title', 'Dashboard | Lara Admin')

@section('content_header')
    <h1>Consultas</h1>
@stop
    <script>
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>

@section('content')
@include("admin.fichas.alert")
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Fichas</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 450px;">
        <table class="table table-head-fixed">
                
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nome</th>
              <th>Tipo</th>
              <th>Dono(a)</th>
              <th>Telefone</th>
              <th>Agendado para<th>
            </tr>
          </thead>
          <tbody>
              @foreach($ficha as $row => $value)
         
               @endforeach
                
              
          </tbody>
        </table>
        
      </div>
      <!-- /.card-body -->
    </div>
  <a href="{{route("consultas.create")}}" class="btn btn-info font-weight-bold">Agendar</a>
        <!-- /.card -->
       <!-- Button trigger modal -->

    </div>

@stop