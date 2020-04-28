<!--
//register.php
!-->
<?php
include('database_connection.php');
session_start();
$message = '';
if(isset($_SESSION['user_id']))
{
	header('location:index.php');
}

if(isset($_POST["register"]))
{

	$username = trim($_POST["username"]);
	$name = trim($_POST["name"]);
	$address = trim($_POST["address"]);
	$address2 = trim($_POST["address2"]);
	$address3 = trim($_POST["address3"]);
	$address4 = trim($_POST["address4"]);
	$addressAditional = trim($_POST["addressAditional"]);
	$password = trim($_POST["password"]);
	$check_query = "
	SELECT * FROM login 
	WHERE username = :username
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':username'		=>	$username
	);
	if($statement->execute($check_data))	
	{
		if($statement->rowCount() > 0)
		{
			$message .= '<script type="text/javascript">
			function showAndroidToast(toast) {
				Android.showToast(toast);
			}
			showAndroidToast("Teléfono existente!");
		</script>';
		}
		else
		{
			if(empty($username))
			{
				$message .= '<script type="text/javascript">
				function showAndroidToast(toast) {
					Android.showToast(toast);
				}
				showAndroidToast("Teléfono requerido!");
			</script>';
			}
			if(empty($password))
			{
				$message .='<script type="text/javascript">
				function showAndroidToast(toast) {
					Android.showToast(toast);
				}
				showAndroidToast("Contraseña requerida!");
			</script>';
			}
			else
			{
				if($password != $_POST['confirm_password'])
				{
					$message .= '<script type="text/javascript">
					function showAndroidToast(toast) {
						Android.showToast(toast);
					}
					showAndroidToast("Contraseñas no coinciden!");
				</script>';
				}
			}
			if($message == '')
			{
				$data = array(
					':username'		=>	$username,
					':name'		=>	$name,
					':address'		=>	$address,
					':address2'		=>	$address2,
					':address3'		=>	$address3,
					':address4'		=>	$address4,
					':addressAditional'		=>	$addressAditional,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO login
				(username, name, password) 
				VALUES (:username, :name, :password);

				INSERT INTO loginaddress
				( address, address2, address3, address4, addressAditional) 
				VALUES (:address,:address2,:address3,:address4,:addressAditional);
				";
				
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$message = "<p>Registro Exitoso!</p>";
					header('location:register-success.php');
				}
			}
		}
	}
}
?>
<html>  
    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">  
        <title>Domiti</title>  
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<link rel="stylesheet" href="./assets/css/estilos.css">
  		<script src="./assets/css/jquery.min.js"></script>
  		<!--nuevo-->
  		<link rel="stylesheet" href="./assets/css/materialize.min.css">
		<link rel="stylesheet" href="./assets/css/style.css">
		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="assets/js/materialize.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	</head> 
<!--Inicio cabecera-->	
<header>
	<ul class="menu">
		<a href="login.php">
			<img src="./assets/img/logo.png" alt="" width="50px" height="50px">
		</a>
        <li>
			<a href="login.php">Ingresar a mi cuenta</a>
			<ul>

			</ul>
		</li>
	</ul>   
</header>
<!--final cabecera-->

<body>  
	<div class="container">
		<div class="panel panel-default">
  			<div class="panel-heading"><h3 align="center">Regístrate</h3></div>
				<div class="panel-body" >
				<form method="post">
				<h6 >Datos Basicos</h6>
				<div class="divborde" style="border-radius: 20px; border: 1px solid; ">
	            <div class="input-field col s12" style="margin:20px;">
                	<input id="password" type="tel" name="username" required="required" class="form-control" minlength="10" maxlength="10">
                	<label for="password">Tel&eacute;fono</label>
                	<span class="lbl-error"></span>
				</div>
				<div class="input-field col s12" style="margin:20px;">
                	<input id="password" type="text" name="name" required="required" class="form-control" minlength="5" maxlength="30">
                	<label for="password">Nombres</label>
					<span class="lbl-error"></span>
				</div>
				</div>
				<h6 >Ubicacion</h6>
				<div class="divborde" style="border-radius: 20px; border: 1px solid; ">
				<label style="margin:20px;">Direccion de entrega</label>
				<div class="input-field col s12" style="margin:20px;">
					<select name="address"  class="form-control" style="width: 30%; display: inline; margin-right: 5px;">
					<option value="Calle" selected>Calle</option> 
					<option value="Carrera" >Carrera</option>
					</select>
                	<input  type="text" name="address2"  class="form-control" minlength="1" maxlength="4" style="width: 15%;     margin-right: 20px;"> 
					<input  type="text" name="address3"   class="form-control" placeholder="#" minlength="1" maxlength="4" style="width: 15%;    margin-right: 10px;"> 
					<input  type="text" name="address4"  class="form-control" minlength="1" maxlength="4" placeholder="-" style="width: 15%;    margin-right: 10px;"> 
            
					
				</div>
			
				<div class="input-field col s12" style="margin:20px;">
                	<input id="password" type="text" name="addressAditional"   class="form-control" minlength="5" maxlength="30" >
                	<label for="password">Direccion Adicional: Barrio, Piso, Apto</label>
                	<span class="lbl-error"></span>
				</div>

				</div>
				<h6 >Contraseña</h6>
				<div class="divborde" style="border-radius: 20px; border: 1px solid; ">
					<div class="input-field col s12" style="margin:20px;">
                    <input id="password" type="password" name="password"  required="required" class="form-control">
                    <label for="password">Contraseña</label>
                	<span class="lbl-error"></span>
                </div>                          
				<div class="input-field col s12" style="margin:20px;">
                    <input id="password" type="password" name="confirm_password"  required="required" class="form-control">
                    <label for="password">Confirme contraseña</label>
                    <span class="lbl-error"></span>
				</div>
				</div>
				<div align="left">
				<p>Ver los<a href="terminos.php" class="txt"> Terminos y Condiciones</a></p>
				</div>


				<br>
				<span class="text-danger" style="color:#8E7B00;font-size: 15px;"><?php echo $message; ?></span>
				<div class="form-group" align="center">
					<input type="submit" name="register" class="button" value="Registrarme"  />
				</div>
			
				</form>
			</div>
		</div>
	<br>
				<div align="center">
				<h6>&iquest;Ya tienes una cuenta&#63; 	<a href="login.php" class="txt"> Haz click aqu&iacute; para iniciar sesi&oacute;n.</a></h6>
				</div>
	</div>
</body>  
</html>
