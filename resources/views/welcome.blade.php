 
<!DOCTYPE html>

<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" /> 
    
    <title>MAZ Partes</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{'css/Principal.css'}}">
</head>
@INCLUDE('autenticacion.Funciones_login')
 
<body > 
  <div class="container-fluid">
 @INCLUDE('barra')
 </div> 
  <div class="container-fluid" id="GaleriaGeneral">
    
    @INCLUDE('modal')
    @INCLUDE('carrousel')
    <div class="row" id="work">
      <div class="col-md-3 col-3 " style=" padding: 0px 10px 10px;">
        <div  style="height:100%; background: #EBEDEF; color: red; max-height: 1200px; margin-left: 0px; padding: 10px; -webkit-box-shadow: 0px 0px 26px -13px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 26px -13px rgba(0,0,0,0.75);
box-shadow: 0px 0px 26px -13px rgba(0,0,0,0.75);">
          @INCLUDE('filtros.filtros')
        </div> 
      </div>

      <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 text-center" style="margin-left: -20px; padding: 0px"> 
        <div class="container galeriaProductos" id="la_galeria" >
             
        </div>
      </div>

        <div class="col-2" id="right_wind" style="margin-left: -26px"> 
          @INCLUDE('Carrito')
        </div> 
    </div>  
  </div>

<div class="container-fluid DetallesProducto"  id="DetallesProducto" >
    <div class="row" ></div>
</div>

<div>
   @INCLUDE('pie_de_pagina')
</div>

</body>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Note</button>-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body" id="modal-body" style="max-height: 600px; overflow: auto;">
        Modal body..
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>     
    </div>
  </div>
</div>

<div id="qwerty" class="modal fade bd-example-modal-lg" tabindex="10" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="cabecera"></h4>
      </div>
    </div>
  </div>
</div>
   
</html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript">
  $('#center_wind').css("height", screen.height-312);
  $('#center_wind').css("max-height", screen.height-312); 
  $('.botonOp').click(function(){$('#qwerty').modal('show');});  
</script>

<script src="{{'jquery/Principal.js'}}"></script>
<script type="text/javascript">
    MuestraProductos('');
</script>

  
  
 