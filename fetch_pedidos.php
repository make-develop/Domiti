<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM orders 
WHERE user_id = '".$_SESSION['user_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="rwd-table">
<thead>
	<tr>
		<td >Pedido</td>
		<td ></td>
		<td ></td>
		<td ></td>
		<td></td>
		<td></td>
	</tr>
	</thead>
	<tbody>
';
if(!empty($result)){
foreach($result as $row)
{
	$es = $row['estado'];
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($es == '0')
	{
		$es = '<span  class="label label-danger" data-id="' . $row['id'] . '" >Tu pedido no ha sido tomado</span>';
	}
	else if($es == '1')
	{
		$es = '<span class="label label-success" data-id="' . $row['id'] . '" > Tu pedido ha sido Tomado</span>';
	}else if($es=='2'){
		$es = '<span class="recogido" data-id="' . $row['id'] . '" >Pedido Recogido</span>';
	}else if($es=='3'){
	$es = '<span class="camino" data-id="' . $row['id'] . '" >Voy en camino</span>';
	}else if($es=='4'){
		$es = '<span class="cinco" data-id="' . $row['id'] . '" >Cinco Minutos</span>';
	}else if($es=='5'){
			$es = '<span class="afuera" data-id="' . $row['id'] . '" >Estoy Afuera</span>';
	}else if($es=='6'){
		$es = '<span class="entregado" data-id="' . $row['id'] . '" >Entregado</span>';
	}	
	$output .= '
	<tr>
	<td>'.$es.'</td>
		<td>'.$row['favor'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$row['address'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$row['addressAditional'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$row['metodopago'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.'$'.$row['valor'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>

	</tr>
	';
}

$output .= '</tbody></table>';


echo $output;

}else{
	echo "No hay pedidos!";
}


?>