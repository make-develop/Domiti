<?php

//remove_chat.php

include('database_connection.php');

if(isset($_POST["id"]))
{
	$estado=$_POST['estado'];

	$query = "
	UPDATE orders 
	SET estado = '$estado', updated_at = now() 
	WHERE id = '".$_POST["id"]."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	echo "funciona";
}else{
	echo "error";
}

?>