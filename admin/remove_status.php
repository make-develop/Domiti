<?php

//remove_chat.php

include('database_connection.php');

if(isset($_POST["id"]))
{
	$query = "
	UPDATE orders 
	SET estado = '1' 
	WHERE id = '".$_POST["id"]."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();
}

?>