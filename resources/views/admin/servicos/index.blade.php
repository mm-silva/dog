@extends('adminlte::page')
  <style>
    .modal-dialog {
    max-width: 800px !important;
    }
    .titulos{
      visibility: hidden;
    }
  </style>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.js"></script>
    


 @section('title', '| Serviços')


@section('content')
@include("admin.fichas.alert")
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Serviços</h3>

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
                
          <thead class="titulos">
            <tr>
              <th>#</th>
              <th>Serviço</th>
              <th>Descrição</th>
              <th>Valor</th>
            
          </thead>
          <tbody class="insert">
            {{-- <tr > --}}
           
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
                
          
            {{-- </tr> --}}
         {{-- <tr> --}}
          </tbody>
        </table>
        
      </div>
      <!-- /.card-body -->
    </div>
  
        <!-- /.card -->

  
  <button type="button" class="btn btn-info font-weight-bold" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Novo</button>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Criar novo Serviço</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="d-flex justify-content-center">
            <div class="spinner-border text-success" id="loadin" style="display:none;width: 3rem; height: 3rem;" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

        <div class="modal-corp">
        <div class="modal-body">
          
          <form>
              <div class="row">
                  <div class="col-6">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Serviço:</label>
                        <input name="servico" type="text" maxlength="30"class="form-control" id="recipient-name">
                      </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Valor:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">R$</span>
                            </div>
                            <input name="valor" id="dinheiro" type="text" maxlength="12" class="form-control">
                           
                          </div>
                         
                        </div>
                      </div>
          </div>
          
            <div class="form-group">
              <label for="message-text" class="col-form-label">Descrição:</label>
              <textarea name="descricao" maxlength="50" class="form-control" id="message-text"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          
          <button id="send" type="button" class="btn btn-primary">Criar</button>
        </div>
      </div>
    </div>
    </form>
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
});

$("#dinheiro").mask("#.##0,00", {reverse: true});


    function re(valor){
      
      return valor.replace('.',',');

    }

   function tabela(){ 
       
        $.getJSON( "/api/servicos", function( data ) {
          
          tabelas = ""
  $.each(data, function(index, value){ 
    tabelas += "<tr><td class='align-middle'>" + value.id_servico +"</td>"
    +"<td class='align-middle'>"+ value.tipo_servico +"</td>"
    +"<td class='align-middle'>"+ value.descricao +"</td>"
    +"<td class='align-middle'>R$ "+ re(value.valor) +"</td>"
    +"<td class='align-middle'><button onclick='deletar("+value.id_servico+")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></td></tr>"
    
  
  });
  $(".insert").html(tabelas)   
     
      }).done(function() {
        $(".insert").show()
        $(".titulos").css("visibility","visible")
    console.log( "second success" );
  });}
  
  function deletar(ids){
  delete_url = "/api/servicos/" + ids
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
                url:delete_url,
                type: 'delete', // replaced from put
                dataType: "JSON",
                success: function(result){
                  let tabela = ""
                  $.each(result, function(index, value){ 
    tabela += "<tr><td class='align-middle'>" + value.id_servico +"</td>"
    +"<td class='align-middle'>"+ value.tipo_servico +"</td>"
    +"<td class='align-middle'>"+ value.descricao +"</td>"
    +"<td class='align-middle'>"+ value.valor +"</td>"
    +"<td class='align-middle'><button onclick='deletar("+value.id_servico+")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></td></tr>"
    
  
  });
  $(".insert").html(tabela)  

                    swal("Serviço excluido com sucesso", {
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
 


    jQuery(document).ready(function(){

//  $("#dinheiro").keyup(function(){
//    let xx = $("#dinheiro").val()
//    return console.log(xx)
// });



      
      tabela()

            jQuery('#send').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "/api/servicos/",
                  method: 'post',
                  data: {
                     tipo_servico: $( "input[name='servico'" ).val(),
                     valor: $( "input[name='valor'" ).val(),
                     descricao: $( "textarea[name='descricao'" ).val()
                  },beforeSend: function() {
                    $("#loadin").show()
                    $(".modal-corp").hide()
                  },
                  success: function(result){
                    $( "input[name='servico'" ).val(""),
                    $( "input[name='valor'" ).val(""),
                    $( "textarea[name='descricao'" ).val("")
                    $("#loadin").hide()
                    $(".modal-corp").show()
                    $('#exampleModal').modal('hide');
                    swal({
                   title: result,
                   text: ":)",
                   icon: "success",
                    dangerMode: true,
                    });  
                    tabela()
                  }
                  });
               });
            });
 
  </script>