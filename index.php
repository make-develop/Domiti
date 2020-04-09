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
//INICIO ENVIO FORM
if(isset($_POST["register"]))
{
	$id = trim($_POST["id"]);
	$favor = trim($_POST["favor"]);
	$valor = trim($_POST["valor"]);
	$address = trim($_POST["address"]);
	$addressAditional = trim($_POST["addressAditional"]);
	$propina = trim($_POST["propina"]);
	$metodopago = trim($_POST["metodopago"]);
	$domicilio = trim($_POST["domicilio"]);
	$total = trim($_POST["total"]);
	$user_id = trim($_POST["user_id"]);
	$check_query = "
	SELECT * FROM orders 
	WHERE id = :id
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':id'		=>	$id
	);
	if($statement->execute($check_data))
	{
		if($statement->rowCount() > 0)
		{
			$message .= '<p>Tel&eacute;fono ya esta registrado</p>';
		}
		else
		{
			if(empty($favor))
			{
				$message .= '<p>Tel&eacute;fono es requerido</p>';
			}
			if(empty($valor))
			{
				$message .= '<p>Contrase���a es requerida</p>';
			}
		}
			if($message == '')
			{
				$data = array(
					':id'		=>	$_POST['id'],
					':favor'		=>	$_POST['favor'],
					':valor'		=>	$_POST['valor'],
					':address'		=>	$_POST['address'],
					':addressAditional'		=>	$_POST['addressAditional'],
					':propina'		=>	$_POST['propina'],
					':metodopago'		=>	$_POST['metodopago'],
					':domicilio'		=>	$_POST['domicilio'],
					':total'		=>	$_POST['total'],
					':user_id'		=>	$_SESSION['user_id']
				);
	$query = "
	INSERT INTO orders 
	(id, favor, valor, address, addressAditional, propina, metodopago, domicilio, total, user_id) 
	VALUES (:id, :favor, :valor, :address, :addressAditional, :propina, :metodopago, :domicilio, :total, :user_id)
	";
	$statement = $connect->prepare($query);
	if($statement->execute($data))
	{
		$message = "<p>Registro Exitoso!</p>";
		header('Location: indexfrom.php');
	}
}
}
}
//FIN ENVIO
?>



<html>  
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>Domiti</title> 
		
		
		
		<!--sichat-->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
		<!--login-->
		<link rel="stylesheet" href="./assets/css/materialize.min.css"> <!--TEXTLAYOUT-->
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		

		<link rel="stylesheet" href="./assets/css/divocultar.css">
		 
		<!--nuevo-->
		<script src="./assets/js/summary.js"></script>
		<link rel="stylesheet" href="./assets/css/index_styles.css">


		
		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		
  	
		  
  <script src="./assets/js/jquery.bootstrap-touchspin.js"></script>

	

	</head>
	        <!--Inicio cabecera-->	
<header id="main-header">
	<ul class="menu">

		<a href="login.php">
			<img src="./assets/img/logo.png" alt="" width="50px" height="50px">
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
<!--PEDIDO-->
<br>
<div class="contenedor" id="bed">
	<h3>Pide lo que quieras!</h3>
	<form id="formulario" method="post">
	<div class="form-group green-border-focus">
    	<textarea  id="password" type="text" name="favor" required="required" class="form-control" rows="2" > </textarea>
        <span class="lbl-error"></span>
	</div>

<!--Inicio Valor-->
<div class="valor">
	<span>Valor
	<div class="col-md-5">
	  <div class="form-group">
		<input id="valor" type="text" class="form-control"  value="0" step="500" data-decimals="0" name="valor" class="col-md-7 form-control" required="required" Onchange ="recibir('valor');suma('valor')">
		</span>
	  </div>
	</div>
</div>

	<div class="input-field col s12">
        <input id="password" type="text" name="address" class="validate"  class="form-control" minlength="5"  value="<?php echo $_SESSION['address']; ?> " maxlength="30">
        <label for="password">Direccion de entrega</label>
        <span class="lbl-error"></span>
	</div>
	<div class="input-field col s12">
    	<input id="password" type="text" value="<?php echo $_SESSION['addressAditional']; ?> " name="addressAditional" class="validate"  class="form-control" minlength="5" maxlength="30" >
        <label for="password">Direccion Adicional: Barrio, Piso, Apto</label>
        <span class="lbl-error"></span>
        </div>
<!--Inicio Valor-->
<div class="valor">
	<span>Propina
	<div class="col-md-5">
	  <div class="form-group">
		<input id="propina" type="text" class="form-control"  value="0" step="500" data-decimals="0" name="propina" class="col-md-7 form-control" required="required" Onchange ="recibir('propina');suma('propina')">
		</span>
	  </div>
	</div>
</div>

<h4 >Metodo de pago</h4>
	<div class="input-field col s12">
		<select name="metodopago"  class="form-control">
		<option value="Efectivo" selected>Efectivo</option> 
 		<option value="Nequi" >Nequi</option>
 		<option value="Daviplata">Daviplata</option>
		</select>
    </div>
<div style="display: none">
<input id="domi" type="number" name="domicilio" class="form-control" class="validate">
<input id="total" type="number" name="total" class="form-control" class="validate">
</div>
<br>
  <!--Summary-->
	<table>
		<tr>
			<td>Productos</td>
			<td><div id="product" >$0</div></td>
		</tr>
		<tr>
			<td>Domicilio</td>
			<td><div id="domidiv">$0</td>
		</tr>
		<tr>
			<td>Propina</td>
			<td><div id="tip">$0</div></td>
		</tr>
		<tr>
			<td>TOTAL.....</td>
			<td><div id="totaldiv">$0</div></td>
		</tr>
	</table>
	<span class="text-danger" style="color:#8E7B00;font-size: 15px;"><?php echo $message; ?></span>
		<div class="form-group" align="center">
			<input type="submit" name="register" class="button" value="PEDIR AHORA!"  />
		</div>
</form>
  <div class="col-md-7">
	<script>
	  $("input[name='valor']").TouchSpin({

		min: 0,
		max: 1000000,
		maxboostedstep: 10000000,
		prefix: '$'
	  });
	</script>
	<script>
	  $("input[name='propina']").TouchSpin({

		min: 0,
		max: 1000000,
		maxboostedstep: 10000000,
		prefix: '$'
	  });
	</script>
	</div>
	<script>
	prettyPrint();
	</script>
<!--CARGAR PAGINA AJAX-->
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$('#chat').click(function(){
				$('#bed').load("indexchat.php");
			});
		});
</script>


</div>
<!--fin valor-->
		  <!---PRUEBA DE FOOTER-->
<footer id="foot">
<ul class="menu">

<a href="login.php">
	<img src="./assets/img/home.png" alt="" width="30px" height="50px" class="homeimg">
</a>

<li>
<a href="#" id="chat">
<img src="./assets/img/chat.png" alt="" width="30px" height="40px" >
</a>
</li>
<li>
<a href="logout.php">
<img src="./assets/img/pedidos.png" alt="" width="30px" height="40px">
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


<script>  
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		update_last_activity();
		fetch_user();
		update_chat_history_data();
		fetch_group_chat_history();
	}, 5000);

	function fetch_user()
	{
		$.ajax({
			url:"fetch_user.php",
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
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
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
			alert('Type something');
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
		if(confirm("Are you sure you want to remove this chat?"))
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