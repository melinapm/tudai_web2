$(document).ready(function(){
    $('#div_principal').load('calculadora.html',function() {
        $("#div_principal").fadeIn(800);
        });
    $("#calculadora").click(function(e){
      e.preventDefault();
      $('#div_principal').load('calculadora.html',function() {
          $("#div_principal").fadeIn(800);
        });
    })
    $("#numeroPI").click(function(e){
        e.preventDefault();
        $('#div_principal').load('E8_numero_PI.php',function() {
            $("#div_principal").fadeIn(800);
        });
    })
    $("#about").click(function(e){
        e.preventDefault();
        $('#div_principal').load('E8_about.php',function() {
            $("#div_principal").fadeIn(800);
        });
    })
  });