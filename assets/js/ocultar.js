var clic = 1;
function divAuto(){ 
   if(clic==1){
   document.getElementById("div-mostrar").style.height = "100px";
   clic = clic + 1;
   } else{
    document.getElementById("div-mostrar").style.height = "0px";      
    clic = 1;
   }   
}