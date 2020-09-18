<style type="text/css">
	 #xcontenido {
				    position: relative;
				    width: 420px;
				    max-width: 420px;
				    max-height: 320px;
				   
				    margin: 100px auto;
				    border: 2px solid gray;
				    border-radius: 10px;
				    box-shadow: 1px 1px 5px rgba(50,50,50 0.5);
				    align-content: center;
				    text-align: center;
				    float: none;
				    display: inline-block;
				    margin-bottom: 10px;
				    padding: 20px;
				    overflow: scroll;
			   }

.ajusteimagen {width:100%;  height: 100%; overflow: hidden;
				
					padding: 6px;
					margin: 6px;
					margin-left: 2px;

			
					overflow: hidden;
				}


	 @supports(object-fit: cover){
    .ajusteimagen img{
			      	height: 100%;
			      	object-fit: cover;
			      	object-position: center center;
			      	padding: 2px;
			      	
    			}			
			   
    .ajusteimagen:hover { cursor: crosshair; }			
	.marcoFoto {
					width: 70%;
					height: 70px;
					text-align: center;
					padding: 6px;
					margin: 6px;
					margin-left: 2px;
					border: 1px solid gray;

					overflow: hidden;
					 
			   }

	.marcoFoto:hover {
						border: 3px solid black;	
						-webkit-box-shadow: 0px 0px 39px -11px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 39px -11px rgba(0,0,0,0.75);
box-shadow: 0px 0px 39px -11px rgba(0,0,0,0.75);	
					}	

	@supports(object-fit: cover){
    .marcoFoto img{
			      	height: 100%;
			      	object-fit: cover;
			      	object-position: center center;
			      	padding: 2px;
    			}
    		

   
    .marcoModelos { display: block; 
    				width: 100%;  
    				margin-top: 10px; 
    				height: 120px; 
    				background: #e3e3e3; 
    				border: 1px solid #fff; 
    				font-size: 0.7em;
    			   }

    .marcoModelos p { font-size: 1.7em; margin-bottom: 1px; }			   

    .cabeceraMode {  background: #afafaf; width: 50%; float: left;  font-size: 1.5em; }	
    .ModLisContai {  height: 250px; max-height: 250px;  }		   
</style>

<?php 
	if (isset($lista[0])){
							$info=$lista[0];
						 } else { dd($lista);}
	$unida=['unidad','Milimetro','Centimetro','Metro','Pulgada'];
?>	
<div  class="row">
 	
 	  
   <div id="imagenes" class="col-2" style="margin-left: 14px;">
   	<?php 
   	   if (isset($info->detalles->fotos['nombre']))	
   	   {	
   	      		for ($i=0; $i <	sizeof($info->detalles->fotos['nombre']) ; $i++) { 
   	      			 
   	   			echo "<a href='javascript:CambiaImagen(\"".$info->detalles->fotos['nombre'][$i]."\")'><div class=''><img class='marcoFoto'  src='".$info->detalles->fotos['nombre'][$i]."' /></div></a>";
   	      		}
   	   }

   	 ?>

   </div>	     
   

	<div id=" " class="col-5" style="vertical-align:middle;  display:flex; align-items: center;"  >
	 <div id="contenido" class="ajusteimagen" style="padding-top: 25%;">
      <img id="botella"  src="{{$info->detalles->fotos['nombre'][0] ?? ''}}"  alt="No hay imágenes de este producto" data-big="{{$info->detalles->fotos['nombre'][0] ?? ''}}" data-overlay="" />
      </div>

      	<div style="display: block; position: absolute; bottom: -95px; left: 25%; background: ">
       		<button class='boton_agregar btn btn-sm fa fa-shopping-cart'  data-toggle='carAdd'  data-remoto='{{$info->codigo ?? ''}}'	data-extra=''>
			<input class='cantCar' type='number'  placeholder='Disponibilidad: {{$info->cantidad}}'> 
			<div class='TextAgr'>Agregar</div>
		</button>
		</div>
	</div>

	<div class="col-5" style="margin-left: -36px;" >
		<div style="background: #EBEDEF; overflow: hidden; margin: 5px; padding: 10px;">
		 <p>
		 	<strong> Nombre:</strong> {{$info->detalles['nombre'] ?? ''}} <br>
		 	<strong> Código:</strong> {{$info->producto ?? ''}}
		 </p>
		 <strong> Fabricante:</strong> {{$info->detalles->fabricantes['nombre'] ?? ''}}
		 <p><strong> Categoría:</strong> {{$info->detalles->categoria_detalle['nombre'] ?? ''}}</p>

		 @if (isset($info->detalles->modelos['marca']))
	   	 <strong>Marcas aplicables:</strong>
	   	 <table  class="table table-striped" style="font-size: 0.6em" id="tnlmrc">
	   	 	<thead>
	   	 		<th>Marca</th>
	   	 		<th>Modelo</th>
	   	 		<th>Año</th>
	   	 		<th>Cilindraje</th>
	   	 		<th>Motor</th>
	   	 		<th>Observaciones</th>
	   	 	</thead>
	   	 	<tbody style="color: gray;">
	   	 	 	
	   	 		 @for ($i = 0; $i < count($info->detalles->modelos['marca']); $i++)
	   	 		 	<tr id='f{{$i}}'>

	   	 		 		 
	   	 		 	</tr>
	   	 		 	<script type="text/javascript">
		 				$iteem="{{$info->detalles->modelos['marca'][$i] ?? ''}}";
		 				$sbite=('{{$info->detalles->modelos['modelo'][$i] ?? ''}}').substring(3);
	 		 			if ($("#tmar"+$iteem).length==0) { 
		 		 			 $('#f{{$i}}').append("<td id='tmar"+$iteem+"'><strong>"+$('#'+$iteem)[0]['innerHTML']+"</strong></td>");
		 		 			 $('#f{{$i}}').append("<td id='tmod"+$iteem+"'></td><td id='ttie"+$iteem+"'></td><td id='tcil"+$iteem+"'></td><td id='tmot"+$iteem+"'></td><td id='tobs"+$iteem+"'></td>")	
		 		 		} 
						$("#tmod"+$iteem).append($('#'+$iteem+$sbite).find('b')[0]['innerHTML']+'<br>');
						$("#ttie"+$iteem).append('{{$info->detalles->modelos['tiempo'][$i] ?? ''}}<br>');
						$("#tcil"+$iteem).append('{{$info->detalles->modelos['cilindraje'][$i] ?? ''}}<br>');
						$("#tmot"+$iteem).append('{{$info->detalles->modelos['motor'][$i] ?? ''}}<br>');
						$("#tobs"+$iteem).append('{{$info->detalles->modelos['observaciones'][$i] ?? ''}}<br>');
	   	 		 	</script>
	   	 		 @endfor	 
	   	 	</tbody>
	   	 </table>
	   	 @endif
	   	 @if (isset($info->detalles->medidas['nombre']))
	   	 <strong>Medidas:</strong>
	   	 <table  class="table table-striped" style="font-size: 0.6em">
	   	 	<tbody style="color: gray;">
	   	 		 @for ($i = 0; $i < count($info->detalles->medidas['nombre']); $i++)
	   	 		 	<tr>
	   	 		 		<td>{{$info->detalles->medidas['nombre'][$i]}} = {{$info->detalles->medidas['valor'][$i]}} 
	   	 		 		 {{$unida[$info->detalles->medidas['unidad'][$i]]}}
	   	 		 		</td>
	   	 		 	</tr>
	   	 		 	<script type="text/javascript">
			 				 
	   	 		 	</script>
	   	 		 @endfor
	   	 	</tbody>
	   	 </table>
	   	 @endif	   	 
	   	 <div id="listModelos" class="ModLisContai"></div>
	</div>
  </div> <!-- Contenido de informacion -->

</div>
 
<script type="text/javascript">

$(document).ready(function()
{
	 activaLupa();
});

function activaLupa()
{
  img = document.getElementById('botella');
  var width = img.clientWidth;
  var height = img.clientHeight;
 
  if ((width*height)<240080) {return};


   $("#botella").mlens(
    {
        imgSrc: $("#botella").attr("data-big"),   // path of the hi-res version of the image
        lensShape: "square",                // shape of the lens (circle/square)
        lensSize: 200,                  // size of the lens (in px)
        borderSize: 4,                  // size of the lens border (in px)
        borderColor: "#fff",                // color of the lens border (#hex)
        borderRadius: 20,                // border radius (optional, only if the shape is square)
        imgOverlay: $("#botella").attr("data-overlay"), // path of the overlay image (optional)
        overlayAdapt: true // true if the overlay image has to adapt to the lens size (true/false)
    });
}

location.href="#tope";

function CambiaImagen(imagen)
{
  var cambio=" <img id='botella'  src='"+imagen+"' alt='botella con zoom' data-big='"+imagen+"' data-overlay='' />";
  $('#contenido').empty();
  $('#contenido').append(cambio);
  
  activaLupa();

}
</script>

<script type="text/javascript" src="jquery.mlens-1.7.min.js"></script>
