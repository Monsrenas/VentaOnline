
function MuestraProductos(condiciones)
  {    
    console.log(condiciones);
        $('#GaleriaGeneral').show();
        $('#DetallesProducto').hide(); 

    $data=condiciones;
    
    $.get('/pagina', $data, function(subpage){ 

       $('#la_galeria').empty().append(subpage);

    }).fail(function() {
         console.log('Error en carga de Datos');
    });
}

$('#btnbusqueda').on('click', function(){
   
      MuestraProductos($('#portador').val());
      $('#GaleriaGeneral').show();
      $('#DetallesProducto').hide();

});

$(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
});

$(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
            getProd(page);
        });
  
});

function getProd(page){
        $.ajax(
        {
            url: '/pagina?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#la_galeria").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
} 

$('body').on('click', '.cantCar', function(event) 
  {
    $(this).preventDefault();
}); 

$('body').on('click', 'a[data-toggle="detalles"]', function(){
        
          $data="vista=Detalle_Producto&coleccion=Inventario&indice=codigo&ocurrencia="+$(this).data("remoto");
           
          $.get('/Resgistro', $data, function(subpage){ 

             $('#DetallesProducto').empty().append(subpage);
            $('#GaleriaGeneral').hide();
             $('#DetallesProducto').show();
          }).fail(function() {
               console.log('Error en carga de Datos');
          });
});

$('body').on('click', 'button[data-toggle="carAdd"]', function(){

     $cantidad=($(this).children('input')[0]['value']!='') ? $(this).children('input')[0]['value'] : 1;
     $(this).children('input')[0]['value']='';

       $data='{{ csrf_token()}}&url=Carrito&campo='+$(this).data("remoto")+'&descripcion='+$(this).data("extra");

       $data+='&cantidad='+$cantidad;
       console.log($data);

       $.get('CarritoAgregarItem', $data, function(subpage){
             $('#right_wind').empty(); 
                 $('#right_wind').append(subpage);
      }).fail(function() {
         console.log('Error en carga de Datos');
      });  
});  