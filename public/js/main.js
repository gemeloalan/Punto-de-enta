// Para que el datatables funcione correctamente y a su vez con el idioma en espanol
$(document).ready(function(){
    $('.dts').DataTable({
        language:{
            url: 'datatables/spanish.json'
        }
    });
    
    });


    
    // Para que la alerta desparezca despues de dos segunditos papu
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 2000);
    



    
    
    