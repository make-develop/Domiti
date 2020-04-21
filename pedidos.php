<!--
//index.php
!-->
<?php
include('database_connection.php');
session_start();
$message = '';
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}

?>



<html>  
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Domiti</title> 
		
		
		
		<!--sichat-->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
		<!--login-->
		

		<link rel="stylesheet" href="./assets/css/divocultar.css">
		
		 
		<!--nuevo-->
		<link rel="stylesheet" href="./assets/css/materialize.min.css">
		<link rel="stylesheet" href="./assets/css/index_styles.css">
		<link rel="stylesheet" href="./assets/css/tabla.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		
  	
		  
  <script src="./assets/js/jquery.bootstrap-touchspin.js"></script>

	

	</head>
	       <!--Inicio cabecera-->	
<header id="main-header">
	<ul class="menu">
	<a href="login.php">
			<img src="./assets/img/logo.png" alt="" width="45px" height="45px" class="logoimg">
		</a>
		<li>
		<a href="logout.php">
		<img src="./assets/img/salir.png" alt="" width="20px" height="30px">
		</a>
		</li>
		<li>
			<ul>
				
			</ul>
		</li>
		<li>
		<p class="hola">Hola! <?php echo $_SESSION['name']; ?></p>
		</li>
	</ul>   
</header>
<!--final cabecera-->
<body>  

<!--CHAT-->
<div id="bed">
			<div class="contenedor-body">
			<br />
				<div id="user_details" class="datos">


				</div>

			</div>
			<br />
			<br />
</div>
</div>
<!--fin valor-->
		 		  <!---PRUEBA DE FOOTER-->
<footer id="foot">
<ul class="menu">
<a href="index.php">
	<img src="./assets/img/home.png" alt="" width="45px" height="45px" class="homeimg">
</a>

<li>
<a href="indexchat.php">
<img src="./assets/img/chat.png" alt="" width="35px" height="35px" class="imgicon" >
</a>
</li>
<li>
<a href="pedidos.php">
<img src="./assets/img/orderhistorystart.png" alt="" width="35px" height="35px" class="imgicon" >
</a>
</li>
<li>
<a href="pedidoscomplete.php">
<img src="./assets/img/orderpurchase.png" alt="" width="40px" height="40px" class="imgiconp" >
</a>
</li>
</ul>  
</footer>
<!--fIN-->

    </body>  
</html>

<style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>


<style>
.chat_message_area
{
	position: relative;
	width: 100%;
	height: auto;
	background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 3px;
}

#group_chat_message
{
	width: 100%;
	height: auto;
	min-height: 80px;
	overflow: auto;
	padding:6px 24px 6px 12px;
}

.image_upload
{
	position: absolute;
	top:3px;
	right:3px;
}
.image_upload > form > input
{
    display: none;
}

.image_upload img
{
    width: 24px;
    cursor: pointer;
}

</style>  


<script>  
$(document).ready(function(){

	fetch_pedidos();

	setInterval(function(){
		update_last_activity();
		fetch_pedidos();
		update_chat_history_data();
		fetch_group_chat_history();
	}, 2000);

	function fetch_pedidos()
	{
		$.ajax({
			url:"fetch_pedidos.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	function update_last_activity()
	{
		$.ajax({
			url:"update_last_activity.php",
			success:function()
			{

			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name)
	{
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title=" '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Enviar</button></div></div>';
		$('#user_model_details').html(modal_content);
	}

	$(document).on('click', '.start_chat', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		make_chat_dialog_box(to_user_id, to_user_name);
		$("#user_dialog_"+to_user_id).dialog({
			autoOpen:false,
			width:400
		});
		$('#user_dialog_'+to_user_id).dialog('open');
		$('#chat_message_'+to_user_id).emojioneArea({
			pickerPosition:"top",
			toneStyle: "bullet"
		});
	});

	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					//$('#chat_message_'+to_user_id).val('');
					var element = $('#chat_message_'+to_user_id).emojioneArea();
					element[0].emojioneArea.setText('');
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}
		else
		{
			alert('Escribe un mensaje!');
		}
	});

	function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		})
	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
		});
	}

	$(document).on('click', '.ui-button-icon', function(){
		$('.user_dialog').dialog('destroy').remove();
		$('#is_active_group_chat_window').val('no');
	});

	$(document).on('focus', '.chat_message', function(){
		var is_type = 'yes';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{

			}
		})
	});

	$(document).on('blur', '.chat_message', function(){
		var is_type = 'no';
		$.ajax({
			url:"update_is_type_status.php",
			method:"POST",
			data:{is_type:is_type},
			success:function()
			{
				
			}
		})
	});

	$('#group_chat_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#group_chat').click(function(){
		$('#group_chat_dialog').dialog('open');
		$('#is_active_group_chat_window').val('yes');
		fetch_group_chat_history();
	});

	$('#send_group_chat').click(function(){
		var chat_message = $.trim($('#group_chat_message').html());
		var action = 'insert_data';
		if(chat_message != '')
		{
			$.ajax({
				url:"group_chat.php",
				method:"POST",
				data:{chat_message:chat_message, action:action},
				success:function(data){
					$('#group_chat_message').html('');
					$('#group_chat_history').html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_group_chat_history()
	{
		var group_chat_dialog_active = $('#is_active_group_chat_window').val();
		var action = "fetch_data";
		if(group_chat_dialog_active == 'yes')
		{
			$.ajax({
				url:"group_chat.php",
				method:"POST",
				data:{action:action},
				success:function(data)
				{
					$('#group_chat_history').html(data);
				}
			})
		}
	}

	$('#uploadFile').on('change', function(){
		$('#uploadImage').ajaxSubmit({
			target: "#group_chat_message",
			resetForm: true
		});
	});

	$(document).on('click', '.remove_chat', function(){
		var chat_message_id = $(this).attr('id');
		if(confirm("Estas seguro que quieres borrar este mensaje?"))
		{
			$.ajax({
				url:"remove_chat.php",
				method:"POST",
				data:{chat_message_id:chat_message_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
	
});  
</script>