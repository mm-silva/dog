@extends('adminlte::page')
  <style>
    .modal-dialog {
    max-width: 800px !important;
    }
  </style>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
@section('title', '| Consultas')



@section('content')
@include("admin.fichas.alert")
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Consultas</h3>

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
              <th>Tipo</th>
              <th>Dono(a)</th>
              <th>Serviço</th>
              <th>Telefone</th>
              <th>Agendado para<th>
            </tr>
          </thead>
          <tbody class="insert">
              {{-- @foreach($ficha as $row => $value)
            <tr>
              <td> 
                <img src="{{Storage::url($value->imagem)}}" class="img-fluid mb-2" height="100px" width="100px">

                </td>
              <td class="align-middle">{{$value->pet_nome}}</td>
              <td class="align-middle">{{($value->pet_idade < 1 ? "$value->pet_idade meses" : "$value->pet_idade anos")}}</td>
              <td class="align-middle">{{($value->pet_peso < 1 ? "$value->pet_peso g" : "$value->pet_peso kg" )}}</td>
              <td class="align-middle">{{$value->tipo}}</td>
              <td class="align-middle">{{$value->nome_dono}}</td>
              <td class="align-middle">{{ date('d/m/Y', strtotime($value->ultima_visita))}}</td>
              <td class="align-middle">
              <div class="btn-group" role="group" aria-label="Basic example">
              <a href="{{route("fichas.edit",$value->id)}}" class="btn btn-warning"><i class="fas fa-pencil-alt text-white"></i></a>
                <a href="{{route("fichas.show",$value->id)}}" class="btn btn-info"><i class="fas fa-eye text-white"></i></a>
             <form action="{{route("fichas.destroy",$value->id)}}" method="POST">
              @csrf
              @method("DELETE")   
                <button class="btn btn-danger"><i class="fas fa-trash-alt text-white"></i></button>
             
              </div>
             </td>
               </tr>
            <tr>
               @endforeach --}}
                
              
          </tbody>
        </table>
        
      </div>
      <!-- /.card-body -->
    </div>
  
        <!-- /.card -->
        <!-- Button trigger modal -->
<button type="button" class="btn btn-info font-weight-bold" data-toggle="modal" data-target="#exampleModalCenter">
  Agendar
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Agendamentos </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
        </div>
      <form>
        
     
        <div class="modal-body">
            <div class="card-tools">
               
                <div class="input-group input-group-sm" style="width: 95%;">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><b>Pesquisar</b></span>
                      </div>
                  <input type="text" id="myInputs" name="table_search" class="form-control float-right" >
      
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
              </div>
            
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-success" id="loadin" style="display:none;width: 3rem; height: 3rem;" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                  </div>
              

            <div class="card-body table-responsive p-0" id="card-modal" style="height: 250px;width:100%">
                <table id="myTables" class="table  table-head-fixed">
                        
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Nome</th>
                      <th>Idade</th>
                      <th>Peso</th>
                      <th>Tipo</th>
                      <th>Dono(a)</th>
                      <th>Marcar</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($ficha as $row => $value)
                    <tr>
                      <td> 
                        <img src="{{Storage::url($value->foto_pet)}}" class="img-fluid mb-2" height="100px" width="100px">
        
                        </td>
                      <td class="align-middle">{{$value->nome_pet}}</td>
                      <td class="align-middle">{{$value->idade_pet }}</td>
                      <td class="align-middle">{{$value->peso }}</td>
                      <td class="align-middle">{{$value->tipo}}</td>
                      <td class="align-middle"></td>
                      <td class="align-middle"><div class="icheck-danger d-inline">
                      <input type="radio" required value="{{$value->id_pet}}" name="id" id="radioDanger2" checked>
                          <label for="radioDanger2">
                          </label>
                        </div>
                      </td>
                     
                    <tr>
                       @endforeach
                        
                      
                  </tbody>
                </table>
                
              </div>
              <br>
         
                  <div class="container">
                  <div class="row d-flex justify-content-center">
                      <div class="col-3">
                          <div class="form-group">
                              <label>Serviços</label>
                              <select id="select" name="id_servico" class="form-control">
                                @foreach($servico as $key)
                              <option value="{{$key->id_servico}}">{{$key->tipo_servico}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                      <div class="col-3">
                    <label for="festa">Data: </label>
                    <input class="form-control" type="date" id="data "required>
                    <span class="validity"></span>
                    
                  
                  </div>
                  <div class="col-3">
                      <label for="festa">Horario: </label>
                      <input class="form-control time" name="horario"  id="horario" type="time" required>
                      
                    </div>
                  <div>
                  <br>
                 <input id='agenda' type="submit" value="Agendar" style="margin-top:7px" class="btn btn-primary float-right">
                     
            </div>
        </div>
        
      </div>
      
      <br>
        
      </form>
      </div>
    </div>
  </div>
  </div>
@stop
  <script>


$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("#myInputs").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTables tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });


});



function deletar(ids){
  swal({
  title: "Tem certeza que deseja excluir?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {


  if (willDelete) {
    

            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                  });
               $.ajax({
                url:"/api/consultas/" + ids,
                type: 'delete', // replaced from put
                dataType: "JSON",
                success: function(result){
                  tabela()

                    swal("Consulta excluida com sucesso", {
                              icon: "success",
                      });
                     
                  },
                  error: function (){
                    return 'erro' 
                   
                    }
                  });
     
  }
  
});
  }

  function formats(times){
          let datatime = times.split(' ')
   let date = datatime[0].split('-')
   let time = datatime[1].replace(':00','') 
   let format_date = date[2] + "/"+date[1]+"/"+date[0] 
    return format_date + " " + time
         }



function tabela(){ 
       
       $.getJSON( "/api/consultas", function( data ) {
      
         
         tabelas = ""
 $.each(data, function(index, value){ 
   tabelas += "<tr><td class='align-middle'><img src='/storage/" + value.foto_pet +"'  height='100px' width='100px'/></td>"
    +"<td class='align-middle'>"+ value.nome_pet +"</td>"
    +"<td class='align-middle'>"+ value.tipo +"</td>"
    +"<td class='align-middle'>"+ value.nome +"</td>"
    +"<td class='align-middle'>"+ value.tipo_servico +"</td>"
   +"<td class='align-middle'>"+ value.telefone +"</td>"
   +"<td class='align-middle'>"+ formats(value.data_agendada) +"</td>"
   +"<td class='align-middle'><button id="+value.id_agendamento+" onclick='deletar("+value.id_agendamento+")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></td></tr>"
  
 });

 $(".insert").html(tabelas)   
    
     }).done(function() {
       $(".insert").show()
       $(".titulos").css("visibility","visible")
   console.log( "second success" );
 });}


    jQuery(document).ready(function(){

               

      
      tabela()


            jQuery('#agenda').click(function(e){
               e.preventDefault();
               
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "/api/consultas",
                  method: 'post',
                  data: {
                     id_pet: $("input[type='radio']:checked").val(),
                     id_servico: $("#select").val(),
                     data_agendada: $("input[type='date']").val(),
                     horario: $("#horario").val(),
                  },
                  beforeSend: function() {
                    $("#loadin").show()
                    $("#card-modal").hide()
                  },
                  success: function(result){
                   
                   $("#select").val(''),
                   $("input[type='date']").val(''),
                   $("#horario").val(''),
                    $("#loadin").hide()
                    $("#card-modal").show()
                    $('#exampleModalCenter').modal('hide');
                    swal({
                   title: result,
                   text: ":)",
                   icon: (result == "O agendamento já existe!"? "warning":"success"),
                    dangerMode: true,
                    });  
                    tabela()
                 
           
                  }
                  });
               });




              });

              
          

  </script>