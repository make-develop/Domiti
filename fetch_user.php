

<?php

//fetch_user.php

include('database_connection.php');

session_start();

$sesion = $_SESSION['user_id'];

$query = "
SELECT * 
FROM orders 
JOIN loginAdmin ON loginAdmin.user_id= orders.from_user_id
WHERE orders.user_id = $sesion AND estado != 6 ORDER BY  updated_at ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '

<table class="rwd-table" >
';

foreach($result as $row)
{
	$chat = 'Abrir Chat';
	$status = '';
	$sesion=$_SESSION['user_id'];
	$es = $row['estado'];
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	$es = $row['estado'];
	$repartidornombre = $row['username'];
	$repartidorid = $row['user_id'];
	$repartidorid = $row['user_id'];
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
                    $timeupdate = $row['updated_at'];
                    $update_at = strftime("%d de %B %H:%m",strtotime($timeupdate));
                    
                    

					if($es == '0')
					{
						$es = '<span  class="no" data-id="' . $row['id'] . '" >Tu pedido no ha sido tomado</span>';
					}
					else if($es == '1')
					{
						$es = '<span class="tomado" data-id="' . $row['id'] . '" > '.$repartidornombre.' ha tomado tu pedido </span>';
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
					if($repartidorid == '0'){
						$repartidornombre = '';
						$chat = 'Soporte';
					}
	$output .= '
	<tr id="' . $row['id'] . '" >
	<td data-target="sesionid" style="display:none;">'.$sesion.'</td>
	<td data-target="estado" style="display:none;">'.$row['estado'].'</td>
	<td style="display:none;">'.$row['name'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
	</tr>
	<tr id="favorth">
	<th ><textarea readonly="readonly" class="favorarea">'.$favor.'</textarea></th>
	<th width="30%" >'.$repartidornombre.''.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'<a href="tel:'.$celularpedido.'"><img src="assets/img/phone.png" alt="Llamar" width="50px" height="50px" /></a>
	<h5>'.$address.' '.$address2.' # '.$address3.'-'.$address4.' '.$addressAditional.'</h5>
	<button style="margin-top: 10px;" type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">'.$chat.'</button>
	</th>
	</tr>
	<tr >
	<td>'.$es.'</td>
	</tr>
	<tr >
	<td><h4>'.$metodopago.'</h4></td>
	<td>'.'Total'.'</td>
	<td><h2 class="valordomi">'.'$'.$total.'</h2></td>
	<th><h5>'.$update_at.'</h5></th>
	</tr>
	';
}



$output .= '</table>';

echo $output;

?>
