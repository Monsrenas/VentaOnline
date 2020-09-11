
@extends('panel.menu')
@section('operaciones')

<div id="Centro"  style="font-size: 0.8em; width: 50%; margin-left: 100px;">

  <div class="card card-sm"> 
    <div class="card-header">
        <h6>Listado de fabricantes</h6>
    </div>
    <div class="card-body">
      <div class="card">
        <div class="card-header bg-primary" style="color: white; " >
         
          <div class="row">  
           <strong class="col-lg-10"><i class="fa fa-list"></i> Fabricantes </strong>
          <div class="col-lg-1"><a href="#" data-toggle="modal" data-target="#ModalAuxiliar" onclick="javascript:EditaFabricante('', '/nuevaFabricante')"  class="btn fa fa-plus btn-success"></a></div>
          </div>
        </div>

        <div class="card-body" style="background: white; padding: 10px; ">
            <div class="table-responsive">        
                <table id="tablamarcas" class="table table-striped table-bordered">
                <thead id="cuerpo">
                    <tr>
                        <th></th>
                        <th>Código</th> 
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($lista as $indice =>$patmt)
                    <tr>
                      <td width="60">

                        <button data-toggle="modal" data-target="#ModalAuxiliar" onclick="javascript:EditaFabricante('{{ $patmt['codigo'] }}', '/nuevaFabricante')"   type="button" class="btn btn-sm fa btn-outline-primary fa-pencil" style="font-size: .9em" >
                        </button> 
                        <button onclick="javascript:borraItem('BorraItem', 'Fabricante', ['_id','{{ $patmt->_id}}'])" type="button"   class="btn btn-sm btn-outline-danger fa fa-trash-o" style="font-size: .9em"> 
                        </button>

                      </td>
                      <td >{{$patmt['codigo'] ?? ''}}</td>
                      <td>{{$patmt['nombre'] ?? '' }}</td>                             
                    </tr>
                  @endforeach                                      
                </tbody>        
               </table>                  
            </div>
        </div>
      </div>
    </div>
  </div>    
</div>
@include('panel.modal.Auxiliar')

<script type="text/javascript">

  function EditaFabricante($id, controlador)
{
  $data="codigo="+$id;
  $.get(controlador, $data, function(subpage){ 
        $('#modal-cuerpo-AUX').html(subpage);
    }).fail(function() {
       console.log('Error en carga de Datos');
  });
}
</script>

<script type="text/javascript" src="{{Request::root()}}/jquery/main.js"></script>
@endsection