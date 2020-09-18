

<div class="form-control carHeader" style="width: 240px">
  <div class="fa fa-shopping-cart" id="CarritoCuantos" style="float: left;"></div>
  <div class="fa fa-usd"  id="CarritoImporte" style="float: right; "></div>
   <div class="xpagar"  id="pago"> <button class="btn btn-sm btn-success">Pagar</button> </div>
</div>

<div id="listaCarrito" style="background: white;">
<?php 
  if(!isset($_SESSION)){
                 session_start();
                 if (!isset($_SESSION['MyCarrito'])) {$_SESSION['MyCarrito']= [];}
               } 
  $Importe=0;
  $cantItem=0;
  $carLista=$_SESSION['MyCarrito']; 
  

?>

<div >	
	@foreach ($carLista as $item)
    <div class="carItem" id="ITM{{$item['indice']}}">
    	<a class=''  data-toggle='detalles'  data-remoto='{{$item['invcodigo'] ?? ''}}'><div class=''><img class='carFoto' src="{{$item['fotos'] ??  'images/noimagen.jpg' }}" /></div></a>	
		<div class='contenInfo'>
			 <div style="float: left; width: 30%;"> 
			 	<input size="16" style="width: 50px;  background: #EBEDEF; border: none;" type="number" id="{{$item['indice']}}" class="cantidadItem" value="{{$item['cantidad']}}">
			 </div>
			 <div class='carPrecio'>{{$item['precio']}} $</div>
		<div class='carQuitar'>
		 <button class="btn btn-default fa fa-trash-o fa-lg" data-toggle='carDelItem' data-remoto="{{$item['indice']}}"></button>
		</div>
			 <div class='carInfLin'>Código: {{$item['codigo']}}</div>
			 <div class='carInfLin'>{{$item['fabricante'] ?? ''}}</div>
		</div>
		<div class='carInfLin' style="font-weight: bold; color: black;">{{$item['descripcion'] ?? ''}}</div>
	</div> 
	<?php  
		$precio=(isset($item['precio']) ? (double) $item['precio']:1);
		$cantid=(isset($item['cantidad']) ? (double) $item['cantidad'] : 0);
		$Importe+=($precio*$cantid);
		$cantItem+=$cantid;
	 ?>
	@endforeach
</div>
	
</div>

<script type="text/javascript">

	$('#CarritoImporte').html('{{$Importe}}');
	$('#CarritoCuantos').html(' {{$cantItem}}');
    
	$('body').on('click', 'button[data-toggle="carDelItem"]', function(){  	
	     $data='{{ csrf_token()}}&url=Carrito&campo=&descripcion=&codigo='+$(this).data("remoto");	
	     $.get('CarritoEliminaItem', $data, function(subpage){
	     	   $('#right_wind').empty(); 
	           $('#right_wind').append(subpage);
	     	   //$('#ITM'+subpage).remove();
	    }).fail(function() {
	       console.log('Error en carga de Datos');
	  	});  

	});

	$('.cantidadItem').change(function(){

		$data='{{ csrf_token()}}&url=Carrito&campo=&descripcion=&valor='+$(this)['0']['value']+'&codigo='+$(this)['0']['id'];	
	     $.get('CarritoCambiaCanti', $data, function(subpage){   
	     		     	   $('#right_wind').empty(); 
	           $('#right_wind').append(subpage);
	    }).fail(function() {
	       console.log('Error en carga de Datos');
	  	});  
	});

</script>
