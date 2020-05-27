

function suma(){
    var valor = document.getElementById("total").value;
    var propina = document.getElementsByName("propina").value;
    if(valor<=2000) {
      var domicilio=2000;
    }else if(valor>=2500 & valor<=3500){
      var domicilio=2500;
    }else if(valor>=4000 & valor<=5500){
      var domicilio=2600;
    }else if(valor>=6000 & valor<=7000){
      var domicilio=2700;
    }else if(valor>=7500 & valor<=8500){
      var domicilio=2800;
    }else if(valor>=9000 & valor<=10500){
      var domicilio=2900;
    }else if(valor>=11000 & valor<=12500){
      var domicilio=3000;
    }else if(valor>=13000 & valor<=14500){
      var domicilio=3200;
    }else if(valor>=15000 & valor<=16500){
      var domicilio=3400;
    }else if(valor>=17000 & valor<=18500){
      var domicilio=3600;
    }else if(valor>=19000 & valor<=20500){
      var domicilio=3800;
    }else if(valor>=21000 & valor<=23500){
      var domicilio=4000;
    }else if(valor>=24000 & valor<=28500){
      var domicilio=4200;
    }else if(valor>=29000 & valor<=31500){
      var domicilio=4400;
    }else if(valor>=32000 & valor<=38500){
      var domicilio=4600;
    }else if(valor>=39000 & valor<=43500){
      var domicilio=4800;
    }else if(valor>=44000 & valor<=50000){
      var domicilio=5000;
    }else if(valor>=50500 & valor<=80000){
      var domicilio=5500;
    }else if(valor>=80500 & valor<=100000){
      var domicilio=8000;
    }else if(valor>=100500){
      var domicilio=10000;
    }


    document.getElementById("domidiv").innerHTML= "$"+domi;
    document.getElementById("domicilio").value= domi;

    var resultado = parseInt(valor) + parseInt(propina)+ parseInt(domi);
    document.getElementById("totaldiv").innerHTML = "$"+resultado;   
    document.getElementsByName("total").value = resultado;   
}
