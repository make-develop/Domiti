<?php

//fetch_user.php

include('database_connection.php');

session_start();

$sesion = $_SESSION['user_id'];

$query = "
SELECT * 
FROM orders 
JOIN loginAdmin ON loginAdmin.user_id= orders.from_user_id
WHERE orders.user_id = 20 AND estado != 6 ORDER BY  updated_at ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="rwd-table">
<thead>
	<tr>
		<td ></td>
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
	$repartidornombre = $row['username'];
	$status = '';
	$time = $row['updated_at'];
	$hora = date('H:i:s',strtotime($time)); 
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($es == '0')
	{
		$es = '<span  class="label label-danger" data-id="' . $row['id'] . '" >Tu pedido no ha sido tomado</span>';
	}
	else if($es == '1')
	{
		$es = '<span class="label label-success" data-id="' . $row['id'] . '" > '.$repartidornombre.' ha tomado tu pedido </span>';
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
	<th>'.$hora.'</th>
	<td>'.$es.'</td>
		<td>'.$row['favor'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$row['address'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$row['addressAditional'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$row['metodopago'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.'$'.$row['total'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td>'.$repartidornombre.'</td>
	</tr>
	';
}

$output .= '</tbody></table>';


echo $output;

}else{
	echo "No hay pedidos!";
}


?>