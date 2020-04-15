<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = " SELECT * 
    FROM orders 
    JOIN login ON login.user_id = orders.user_id 
    WHERE orders.user_id != '".$_SESSION['user_id']."' 
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<script>
$(document).ready(function(){

		$(".label-danger").click(function(){
			alert("Boton");
		});
});
</script>
<table class="table table-bordered table-striped">
	<tr>
		<th width="70%">Username</td>
		<th width="20%">Status</td>
		<th width="10%">Action</td>
	</tr>
';

foreach($result as $row)
{
	$es = $row['estado'];
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	if($es == '0')
	{
		$es = '<button class="label label-danger" id="c">No tomado</button>';
	}
	else if($es == '1')
	{
		$es = '<button class="label label-success" >Tomado</button>';
	}
	$output .= '
	<tr>
	<td>'.$row['favor'].'</td>
	<td>'.$row['address'].'</td>
	<td>'.$row['addressAditional'].'</td>
	<td>'.$row['metodopago'].'</td>
	<td>'.'$'.$row['valor'].'</td>
	<td>'.$row['name'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
	<td>'.$es.'</td>
	<td>'.$row['estado'].'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>