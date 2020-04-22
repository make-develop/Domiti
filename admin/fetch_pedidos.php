<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = " SELECT * 
FROM orders 
JOIN login ON login.user_id = orders.user_id 
WHERE orders.user_id != '".$_SESSION['user_id']."' AND orders.estado != 6 AND from_user_id= '".$_SESSION['user_id']."' OR from_user_id = 0
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<script>
$(document).ready(function(){
$(document).on("click", ".label-danger", function(){
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

$(document).on("click", ".label-success", function(){
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

<table class="rwd-table">
	<tr>
		<th width="40%">Username</td>
		<th width="20%">Status</td>
		<th width="10%">Action</td>
	</tr>
';

foreach($result as $row)
{
	$sesion=$_SESSION['user_id'];
	$es = $row['estado'];
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($es == '0')
	{
		$es = '<button  class="label label-danger" data-id="' . $row['id'] . '" >No tomado</button>';
	}
	else if($es == '1')
	{
		$es = '<button class="label label-success" data-id="' . $row['id'] . '" >Tomado</button>';
	}else if($es=='2'){
		$es = '<button class="recogido" data-id="' . $row['id'] . '" >Pedido Recogido</button>';
	}else if($es=='3'){
	$es = '<button class="camino" data-id="' . $row['id'] . '" >Voy en camino</button>';
	}else if($es=='4'){
		$es = '<button class="cinco" data-id="' . $row['id'] . '" >Cinco Minutos</button>';
	}else if($es=='5'){
			$es = '<button class="afuera" data-id="' . $row['id'] . '" >Estoy Afuera</button>';
	}else if($es=='6'){
		$es = '<button class="entregado" data-id="' . $row['id'] . '" >Entregado</button>';
	}	
	$output .= '
	<tr id="' . $row['id'] . '">
	<td>'.$row['favor'].'</td>
	<td>'.$row['address'].'</td>
	<td>'.'$'.$row['valor'].'</td>
	<td>'.$row['name'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
	<td>'.$es.'</td>
	<td data-target="sesionid">'.$sesion.'</td>
	<td data-target="estado">'.$row['estado'].'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>