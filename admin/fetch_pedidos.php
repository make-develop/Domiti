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
$(document).on("click", ".label-danger", function(){
	var id= $(this).data("id");
	var cambio = $("#"+id).children("td[data-target=estado]").text();
	var uno= "1";
	var estado= parseFloat(cambio)+parseFloat(uno);
	alert(estado);
	
	$.ajax({
		url : "remove_status.php",
		method : "post",
		data : {id : id, estado : estado},
		success : function(response){
			console.log(response);
		}
	})
});
});  
</script>

<table class="table table-bordered table-striped">
	<tr>
		<th width="40%">Username</td>
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
		$es = '<button  class="label label-danger" data-id="' . $row['id'] . '" >No tomado</button>';
	}
	else if($es == '1')
	{
		$es = '<button class="label label-success" data-id="' . $row['id'] . '" >Tomado</button>';
	}
	$output .= '
	<tr id="' . $row['id'] . '">
	<td>'.$row['favor'].'</td>
	<td>'.$row['address'].'</td>
	<td>'.'$'.$row['valor'].'</td>
	<td>'.$row['name'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
	<td>'.$es.'</td>
	<td data-target="estado">'.$row['estado'].'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
	</tr>
	';
}

$output .= '</table>';

echo $output;

?>