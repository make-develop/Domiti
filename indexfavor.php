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
			$message .= '<script type="text/javascript">
			function showAndroidToast(toast) {
				Android.showToast(toast);
			}
			showAndroidToast("No se puedo realizar el pedido!");
		</script>';
		}
		else
		{
			if(empty($favor))
			{
				$message .= '<script type="text/javascript">
				function showAndroidToast(toast) {
					Android.showToast(toast);
				}
				showAndroidToast("Por favor, escribe que necesitas!");
			</script>';
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
		header('Location: success.php');
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
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<!--PEDIDO-->
	<br>
	<div class="contenedor" id="bed">
	<h3>Pide lo que quieras!</h3>
		<form id="formulario" method="post" name="formulario" onsubmit="return confirmation()">
			<div class="form-group green-border-focus">
    			<textarea  id="password" type="text" name="favor" required="required" class="form-control" rows="2" > </textarea>
        			<span class="lbl-error"></span>
			</div>
			<!--Inicio Valor-->
			<div class="valor">
				<span>Valor
				<div class="col-md-5">
				<div class="form-group">
					<input id="valor" type="text" class="form-control"  value="0" step="500" data-decimals="0" name="valor" class="col-md-7 form-control"  Onchange ="recibir('valor');suma('valor')">
					</span>
				</div>
				</div>
			</div>
			<div class="input-field col s12">
				<input id="password" type="text" name="address"  class="form-control" minlength="5"  value="<?php echo $_SESSION['address']; ?> " maxlength="30">
				<label for="password">Direccion de entrega</label>
				<span class="lbl-error"></span>
			</div>
			<div class="input-field col s12">
				<input id="password" type="text" value="<?php echo $_SESSION['addressAditional']; ?> " name="addressAditional"  class="form-control" minlength="5" maxlength="30" >
				<label for="password">Direccion Adicional: Barrio, Piso, Apto</label>
				<span class="lbl-error"></span>
			</div>
			<!--Inicio Valor-->
			<div class="valor">
				<span>Propina
				<div class="col-md-5">
				<div class="form-group">
					<input id="propina" type="text" class="form-control"  value="0" step="500" data-decimals="0" name="propina" class="col-md-7 form-control"  Onchange ="recibir('propina');suma('propina')">
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
				<input id="domi" type="number" name="domicilio" class="form-control" >
				<input id="total" type="number" name="total" class="form-control" >
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
	<script type="text/javascript">
     function confirmation() 
     {
        if(confirm("Seguro que quieres realizar el pedido?"))
	{
	   return true;
	}
	else
	{
	   return false;
	}
     }
    </script>
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

</div>
<!--fin valor-->
		  <!---PRUEBA DE FOOTER-->
<footer id="foot">
	<ul class="menu">
	<a href="index.php">
		<img src="./assets/img/homestart.png" alt="" width="45px" height="45px" class="homeimg">
	</a>
		<li>
			<a href="indexchat.php">
				<img src="./assets/img/chat.png" alt="" width="35px" height="35px" class="imgicon" >
			</a>
		</li>
		<li>
			<a href="pedidos.php">
				<img src="./assets/img/orderhistory.png" alt="" width="35px" height="35px" class="imgicon" >
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

<script>  
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		update_last_activity();
		fetch_user();
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

	
});  
</script>