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

.ajusteimagen {width: 400px; max-width: 400px; max-height: 300px; overflow: hidden;}


	 @supports(object-fit: contain){
    .ajusteimagen img{
			      	height: 100%;
			      	object-fit: contain;
			      	object-position: center center;
			      	padding: 2px;
			      	
    			}}			
			   

	.marcoFoto {
					width: 70px;
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
    			}}
    		

   
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

<?php $info=$lista[0];
	
?>	
<div  class="row">
 	
 	  
   <div id="imagenes" class="col-1" >
   	<?php 
   		for ($i=0; $i <	sizeof($info->detalles->fotos['nombre']) ; $i++) { 
   			 
			echo "<a href='javascript:CambiaImagen(\"".$info->detalles->fotos['nombre'][$i]."\")'><div class='marcoFoto'><img src='".$info->detalles->fotos['nombre'][$i]."' /></div></a>";
   		}

   	 ?>

   </div>	     
   

	<div id=" " class="col-6" style="padding: 50px;">
	 <div id="contenido">
      <img id="botella" src="{{$info->detalles->fotos['nombre'][0] ?? ''}}"  alt="botella con zoom" data-big="{{$info->detalles->fotos['nombre'][0] ?? ''}}" data-overlay="" />
      </div>
	</div>

	<div class="col-5" >
		<div style="background: #EBEDEF; overflow: hidden; margin: 5px; padding: 10px;">
		 <p><strong> Nombre:</strong> {{$info->detalles['nombre'] ?? ''}}</p>
		 <strong> Fabricante:</strong> {{$info->detalles->fabricantes['nombre'] ?? ''}}
		 <p><strong> Categoría:</strong> {{$info->detalles->categoria_detalle['nombre'] ?? ''}}</p>
	   	 <strong>Marcas aplicables</strong>
	   	 <table  class="table table-striped table-bordered" style="font-size: 0.6em">
	   	 	<thead>
	   	 		<th>Marca</th>
	   	 		<th>Modelo</th>
	   	 		<th>Año</th>
	   	 		<th>Cilindraje</th>
	   	 		<th>Motor</th>
	   	 		<th>Observaciones</th>
	   	 	</thead>
	   	 	<tbody>
	   	 	 @if (isset($info->detalles->modelos['marca']))	
	   	 		 @for ($i = 0; $i < count($info->detalles->modelos['marca']); $i++)
	   	 		 	<tr>
	   	 		 		<td id="tmar{{$i}}"></td>
	   	 		 		<td id="tmod{{$i}}"></td>
	   	 		 	</tr>
	   	 		 	<script type="text/javascript">
	   	 		 				$iteem="{{$info->detalles->modelos['marca'][$i] ?? ''}}";
	   	 		 				$sbite=('{{$info->detalles->modelos['modelo'][$i] ?? ''}}').substring(3);

	   	 		 			 $("#tmar{{$i}}").append(($('#'+$iteem)[0]['innerHTML']));
	   	 		 			 
	   	 		 		 
	   	 		 			 console.log($('#mrc'+$iteem).children('#dmrc'+$sbite).children('b'));
	   	 		 			 //$("#tmod{{$i}}").append(($('#dmrc'+$iteem).find('b')[0]['innerHTML']));
	   	 		 	</script>
	   	 		 @endfor
	   	 	  @endif	 
	   	 	</tbody>
	   	 </table>
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
        lensSize: 280,                  // size of the lens (in px)
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
  var cambio=" <img id='botella' src='"+imagen+"' alt='botella con zoom' data-big='"+imagen+"' data-overlay='' />";
  $('#contenido').empty();
  $('#contenido').append(cambio);
  
  activaLupa();

}
</script>

<script type="text/javascript" src="jquery.mlens-1.7.min.js"></script>
