<?php

//fetch_user.php

include('database_connection.php');
session_start();
$query = "
SELECT * FROM loginAdmin 
WHERE user_id != '".$_SESSION['user_id']."' AND user_id != 0
";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '
<table class="rwd-table">
';
foreach($result as $row)
{
	$status = '';
	$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
	$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
	$user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
	$output .= '
	<tr>
		<td>'.$row['username'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).' '.fetch_is_type_status($row['user_id'], $connect).'</td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Abrir Chat</button></td>
	</tr>
	';
}
$output .= '</table>';
echo $output;

?>