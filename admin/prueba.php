<?php

//database_connection.php

// ** MySQL Settings ** //


$connect = new PDO("mysql:host=127.0.0.1;dbname=makedeve_domi", "makedeve_mike", "Proyectox1116");



date_default_timezone_set('Asia/Kolkata');


function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE (from_user_id = '".$from_user_id."' 
	AND to_user_id = '".$to_user_id."') 
	OR (from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."') 
	ORDER BY timestamp DESC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '<ul class="list-unstyled">';
	foreach($result as $row)
	{
		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';
		if($row["from_user_id"] == $from_user_id)
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
				$user_name = '<b class="text-success">You</b>';
			}
			else
			{
				$chat_message = $row['chat_message'];
				$user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success">You</b>';
			}
			

			$dynamic_background = 'background-color:#ffe6e6;';
		}
		else
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
			}
			else
			{
				$chat_message = $row["chat_message"];
			}
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			$dynamic_background = 'background-color:#ffffe6;';
		}
		$output .= '
		<li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
			<p>'.$user_name.' - '.$chat_message.'
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	$query = "
	UPDATE chat_message 
	SET status = '0' 
	WHERE from_user_id = '".$to_user_id."' 
	AND to_user_id = '".$from_user_id."' 
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $output;
}


function count_unseen_message($from_user_id, $to_user_id, $connect)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE from_user_id = '$from_user_id' 
	AND to_user_id = '$to_user_id' 
	AND status = '1'
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$count = $statement->rowCount();
	$output = '';
	if($count > 0)
	{
		$output = '<span class="label label-success">'.$count.'</span>';
	}
	return $output;
}

function fetch_group_chat_history($connect)
{
	$query = "
	SELECT * FROM chat_message 
	WHERE to_user_id = '0'  
	ORDER BY timestamp DESC
	";

	$statement = $connect->prepare($query);

	$statement->execute();

	$result = $statement->fetchAll();

	$output = '<ul class="list-unstyled">';
	foreach($result as $row)
	{
		$user_name = '';
		$dynamic_background = '';
		$chat_message = '';
		if($row["from_user_id"] == $_SESSION["user_id"])
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
				$user_name = '<b class="text-success">You</b>';
			}
			else
			{
				$chat_message = $row["chat_message"];
				$user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success">You</b>';
			}
			
			$dynamic_background = 'background-color:#ffe6e6;';
		}
		else
		{
			if($row["status"] == '2')
			{
				$chat_message = '<em>This message has been removed</em>';
			}
			else
			{
				$chat_message = $row["chat_message"];
			}
			$user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
			$dynamic_background = 'background-color:#ffffe6;';
		}

		$output .= '

		<li style="border-bottom:1px dotted #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
			<p>'.$user_name.' - '.$chat_message.' 
				<div align="right">
					- <small><em>'.$row['timestamp'].'</em></small>
				</div>
			</p>
		</li>
		';
	}
	$output .= '</ul>';
	return $output;
}


?>