/**
 *Este es el archivo principal de js que se utiliza en todas las paginas del sistema
 */
$( document ).ready(function() {
    var active = $("body").data('active');
    $("#"+active).addClass('active');
});