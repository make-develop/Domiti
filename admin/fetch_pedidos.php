<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = " SELECT * 
FROM orders 
JOIN login ON login.user_id = orders.user_id 
WHERE orders.user_id != '".$_SESSION['user_id']."' AND orders.estado != 6 AND from_user_id= '".$_SESSION['user_id']."' OR from_user_id = 0 ORDER BY created_at ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<script>
$(document).ready(function(){
$(document).on("click", ".no", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	var sesion = $("#"+id).children("td[data-target=sesionid]").text();
	
	$.ajax({
		url : "remove_status.php",
		method : "post",
		data : {id : id, estado : estado, sesion :sesion},
		success : function(response){
			console.log(response);
		}
	})
});

$(document).on("click", ".tomado", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	
	$.ajax({
		url : "envio_status.php",
		method : "post",
		data : {id : id, estado : estado},
		success : function(response){
			console.log(response);
		}
	})
});


$(document).on("click", ".recogido", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	
	$.ajax({
		url : "envio_status.php",
		method : "post",
		data : {id : id, estado : estado},
		success : function(response){
			console.log(response);
		}
	})
});

$(document).on("click", ".camino", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	
	$.ajax({
		url : "envio_status.php",
		method : "post",
		data : {id : id, estado : estado},
		success : function(response){
			console.log(response);
		}
	})
});

$(document).on("click", ".cinco", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	
	$.ajax({
		url : "envio_status.php",
		method : "post",
		data : {id : id, estado : estado},
		success : function(response){
			console.log(response);
		}
	})
});


$(document).on("click", ".afuera", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	
	$.ajax({
		url : "envio_status.php",
		method : "post",
		data : {id : id, estado : estado},
		success : function(response){
			console.log(response);
		}
	})
});

$(document).on("click", ".entregado", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	
	$.ajax({
		url : "envio_status.php",
		method : "post",
		data : {id : id, estado : estado},
		success : function(response){
			console.log(response);
		}
	})
});

});  
</script>

<table class="rwd-table" >

';

foreach($result as $row)
{
	$sesion=$_SESSION['user_id'];
	$es = $row['estado'];
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
					$nombrepedido = $row['name'];
					$celularpedido = $row['username'];
                    $favor = $row['favor'];
                    $valor = $row['valor'];
					$address = $row['address'];
					$address2 = $row['address2'];
					$address3 = $row['address3'];
					$address4 = $row['address4'];
                    $addressAditional = $row['addressAditional'];
                    $propina = $row['propina'];
                    $metodopago = $row['metodopago'];
                    $domicilio = $row['domicilio'];
                    $total = $row['total'];     
                    setlocale(LC_TIME, 'spanish');       
                    setlocale(LC_TIME, 'es_ES.UTF-8');      
                    $timecreate = $row['created_at'];
                    $create_at = strftime("%d de %B %H:%m",strtotime($timecreate));
                    $create_athora = strftime("%H:%m",strtotime($timecreate));
                    

	if($es == '0')
	{
		$es = '<button  class="no" data-id="' . $row['id'] . '" >Disponible</button>';
	}
	else if($es == '1')
	{
		$es = '<button class="tomado" data-id="' . $row['id'] . '" >Pedido tomado</button>';
	}else if($es=='2'){
		$es = '<button class="recogido" data-id="' . $row['id'] . '" >He recogido el pedido</button>';
	}else if($es=='3'){
	$es = '<button class="camino" data-id="' . $row['id'] . '" >Voy en camino</button>';
	}else if($es=='4'){
		$es = '<button class="cinco" data-id="' . $row['id'] . '" >Llegaré en cinco minutos</button>';
	}else if($es=='5'){
			$es = '<button class="afuera" data-id="' . $row['id'] . '" >Estoy afuera</button>';
	}else if($es=='6'){
		$es = '<button class="entregado" data-id="' . $row['id'] . '" >Pedido Entregado</button>';
	}	
	$output .= '
	<tr id="' . $row['id'] . '" >
	<td data-target="sesionid" style="display:none;">'.$sesion.'</td>
	<td data-target="estado" style="display:none;">'.$row['estado'].'</td>
	<td style="display:none;">'.$row['name'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
	</tr>
	<tr id="favorth">
	<th ><textarea readonly="readonly" class="favorarea">'.$favor.'</textarea></th>
	<th width="30%" >'.$nombrepedido.'<a href="tel:'.$celularpedido.'"><img src="assets/img/phone.png" alt="Llamar" width="50px" height="50px" /></a>
	<h5>'.$address.' '.$address2.' # '.$address3.'-'.$address4.' '.$addressAditional.'</h5>
	<button style="margin-top: 10px;" type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Abrir Chat</button>
	</th>
	</tr>
	<tr >
	<td>'.$es.'</td>

	</tr>
	<tr >
	<td>'.'Producto'.'</td>
	<td><h2 class="valordomi">'.'$'.$valor.'</h2></td>
	<th><h5>'.$create_at.'</h5></th>
	</tr>

	';
}



$output .= '</table>';

echo $output;

?>