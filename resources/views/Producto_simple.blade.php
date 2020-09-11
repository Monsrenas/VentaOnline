
<link rel="stylesheet" href="{{'css/listProducto.css'}}">
 
@foreach($lista as $indice =>$dat)
	<div class='marco_producto'> 
		 
		 @if ($dat->precio>100)
		 <div class='EtiDescuento'>
		 	    10%
		 </div> 
		  <div class='precViej'>{{$dat->precio}}</div>
		  @else
		  <div class='precViej' style="color:white;">.</div>
		 @endif
		

		 <div class='precio'>
		 		{{$dat->precio}}
		 </div>

		 <a class='btn btn-sm '  data-toggle='detalles'  data-remoto='{{$dat->codigo ?? ''}}'>
		 	 <div class='marco_foto'>
		 	 	  <img class='foto' id='imagen' src='{{$dat->detalles->fotos['nombre'][0]?? ''}}' alt='Muestra partes'/>
		 	 </div>
			 <div class='descripcion'>
			 	<p style="color: black; margin-bottom: -1px; font-family: 'Open Sans', sans-serif; font-size: 14px;">
			 		{{$dat->detalles->nombre ?? ''}}
			 	</p>

			 	<p> Fabricante: {{$dat->detalles->fabricantes->nombre ?? ''}}  <br> Código: {{$dat->detalles->codigo ?? ''}}</p>
			 </div>
		</a>

		{{--var $paq=$cod+"<*>"+$fabricante+"<*>"+$precioDesc+"<*>"+$descri+$gale;
	  var $ext=$mods;  // En esta variable, ademas de modelos, va codigo de fabricante y otros datos a mostrar --}}

		<button class='boton_agregar btn btn-sm fa fa-shopping-cart'  data-toggle='carAdd'  data-remoto='{{$dat->producto ?? ''}}'	data-extra=''>
			<input class='cantCar' type='number'  placeholder='Disponibilidad: {{$dat->cantidad}}'> 
			<div class='TextAgr'>Agregar</div>
		</button> 
	</div>
 @endforeach 
 
 <div style="bottom: 0;
        height: 74px;
        margin-left: 0px;
        position: fixed;     
        z-index: 5000; 
        justify-content: center;" class="col-md-7 col-4 d-flex justify-content-cente">

     	{{ $lista->links( '' ) }}      
</div> 	