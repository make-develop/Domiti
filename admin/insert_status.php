<?php

//insert_chat.php

include('database_connection.php');

session_start();

$data = array(
	':id_order'		=>	$_POST['id'],
	':status'			=>	'3'
);

$query = "
INSERT INTO orders 
(id_order, status) 
VALUES (:id_order, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
	echo fetch_user_chat_history($_SESSION['user_id'], $_POST['to_user_id'], $connect);
}

?>