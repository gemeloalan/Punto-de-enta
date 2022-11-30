$(document) .ready(function () {
    $("#agregar") .click(function () {
    agregar();
    });
    });
    
    
    var cont = 1;
    total = 0;
    subtotal = [];
    $("#guardar") .hide() ;
    $("#product_id").change (mostrarValores);
    function mostrarValores() {

    
    datosProdpcto = document .getElementById('product_id').value.split('_');
    $("#precio").val(datosProducto[2]);
    $("#stock") . val (datosProducto[1]) ;
    }



    function agregar()
datosProducto = document .getElementById('product_id').value.split('_');

product_id = datosProducto[ 0];

producto = $("#product_id option:selected") .text();

quantity = $("#cantidad").val();

discount = $("#decuento").val();

price = $("#precio").val();

stock = $("#stock").val();

impuesto = $("#tax").val();

if (product_id != "" && cantidad != "" && cantidad > 0 && decuento != "" && precio != "" && stock != "" && stock > 0 )

if (parseInt(stock) >= parseInt(cantidad)) {

subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
total = total + subtotal[cont];
var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button'
cont++;

 
Limpiar();
totales();
evaluar();
$( '#detalles').append(fila) ;
} else {
Swal.fire({
  type: 'error',
text: 'La cantidad a vender supera el stock.', 
})
}


   
