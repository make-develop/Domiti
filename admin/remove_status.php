<?php

//remove_chat.php

include('database_connection.php');

if(isset($_POST["id_status"]))
{
	$query = "
	UPDATE orders_status 
	SET status = '2' 
	WHERE id_status = '".$_POST["id_status"]."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();
}

?>