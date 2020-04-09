
function recibir()
{
    var valor = document.getElementById("valor").value;
    var propina = document.getElementById("propina").value;
    document.getElementById("product").innerHTML="$"+valor;   
    document.getElementById("tip").innerHTML="$"+propina;        
  //  var suma = valor + propina;
  //   
}        

function suma(){
    var mitad = 2;
    var valor = document.getElementById("valor").value;
    var propina = document.getElementById("propina").value;
    var domi = parseInt(valor)/parseInt(mitad);
    document.getElementById("domidiv").innerHTML= "$"+domi;
    document.getElementById("domi").value= domi;

    var resultado = parseInt(valor) + parseInt(propina)+ parseInt(domi);
    document.getElementById("totaldiv").innerHTML = "$"+resultado;   
    document.getElementById("total").value = resultado;   
}