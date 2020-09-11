 
 
<style type="text/css">
.barra {
    background: #FFFFFF;
    height: 80px;
    margin-bottom: 10px;
    transition-duration:0.4s;
   color: black;
   overflow: hidden;
   font-family: 'Open Sans', sans-serif;
   letter-spacing: 1px;
   font-size: 13px;
         
          
border: 1px solid white;
}

.barra:hover {        
                      height: 300px;
                      transition-duration:0.6s;
                      overflow: scroll;
 } 
         
 .filtros {
              font-weight: normal;
              margin-top: 4px;
 }        
</style>
  <h6 class="filtros">Categorías</h6>
   <div class="border-bottom py-2 barra">
     @include('codificador.categorias')
  </div>
  <h6 class="filtros">Marcas y Modelos</h6>
  <div class="border-bottom py-2 barra">
     @include('codificador.Marcas_Modelos')
  </div>
  <h6 class="filtros">Fabricantes</h6>
  <div class="border-bottom py-2 barra">
     @include('codificador.fabricante')
  </div>
 
    
<!-- Initialize Bootstrap functionality -->
<script>
// Initialize tooltip component
 
  $('.panel-body').css("height", screen.height-510);
  $('.panel-body').css("max-height", screen.height-510);                          

  function SetDatos(id, nombre)
  {

      var $resul=[];
      $resul['fabricante']=[]; 
         
      
       $resul['fabricante']=id;
      
       cargarListaProductos($resul);

  }


  function FiltrarCategoria(id)
{
  var $resul=[];
  $resul['categoria']=[];
  $resul['categoria'][0]=id.substring(3);
  //$resul['palabra']=[];
  //$resul['palabra'].push('monsrenas');
  
  MuestraProductos($resul);
}


$('body').on('click', '.xcaretX,.caretX', function(){      
  
    if ($(this).hasClass("caretX-down")||$(this).hasClass("xcaretX")){
      FiltrarCategoria($(this)['0']['id']);    }

});


function FiltrarModelo(id)
{
  var $resul=[];
  $resul['marca']=[]; 
  $resul['modelo']=[];
  //$resul['palabra']=[];
  //$resul['palabra'].push('monsrenas');
  if (id.length>3) {$resul['modelo'].push(id);} else {$resul['marca'].push(id);}
   MuestraProductos($resul);
}

$('body').on('click', '.Xmarcas', function(){      
    if ($(this).hasClass("caret-down")||$(this).hasClass("xcaret")){
      FiltrarModelo($(this)['0']['id']);    }

});

$('body').on('click', '.xModelo', function(){      
      FiltrarModelo($(this).parent().parent().attr('id').substring(3)+$(this)['0']['id']);    
});

  /*PreLoadDataInView('#Interrogation', '&modelo=Interrogation&url=consultation.interrogation', 'flexlist');
   echo VIEW::make("consultation.PhysicalExamination")*/
</script>