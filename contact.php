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
	$nombrelocal = trim($_POST["nombrelocal"]);
	$mensaje = trim($_POST["mensaje"]);
	$phone = trim($_POST["phone"]);
	$check_query = "
	SELECT * FROM contacto
	WHERE phone = :phone
	";
	$statement = $connect->prepare($check_query);
	$check_data = array(
		':phone'		=>	$phone
	);
	if($statement->execute($check_data))	
	{
		if($statement->rowCount() > 0)
		{
			$message .= '<script type="text/javascript">
			function showAndroidToast(toast) {
				Android.showToast(toast);
			}
			showAndroidToast("Telefono existente!");
		</script>';
		}
		else
		{
			if(empty($phone))
			{
				$message .= '<script type="text/javascript">
				function showAndroidToast(toast) {
					Android.showToast(toast);
				}
				showAndroidToast("Telefono requerido!");
			</script>';
			}
			}
			if($message == '')
			{
				$data = array(
					':nombrelocal'		=>	$nombrelocal,
					':mensaje'		=>	$mensaje,
					':phone'		=>	$phone,
				);

				$query = "
				INSERT INTO contacto
				(nombrelocal, mensaje, phone) 
				VALUES (:nombrelocal,:mensaje,:phone)
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$message = "<p>Registro exitoso! En breve nos comunicaremos contigo!</p>";
					header('location:contact-success.php');
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
        <li><a href="login.php">Iniciar Sesion!</a>
	<ul>

    </ul>
    </li>
    </ul>   
</header>
<!--final cabecera-->
    <body >  
        <div class="container">
		<br />
			<div class="panel panel-default">
  				<div class="panel-heading"><h2>¿Tienes un establecimiento?</h2></div>
				<div class="panel-body">
				<form method="post">
				<div class="input-field col s12">
                    <input id="password" type="text" name="nombrelocal"  required="required" class="form-control" minlength="2" maxlength="40">
                    <label for="password">Nombre del establecimiento</label>
				<span class="lbl-error"></span>
				</div>
				<div class="input-field col s12">
                    <input id="password" type="text" name="mensaje"   class="form-control" minlength="0" maxlength="200">
                    <label for="password">Mensaje</label>
                    <span class="lbl-error"></span>
				</div>
				<div class="input-field col s12">
                    <input id="password" type="number" name="phone"  class="form-control" minlength="10" maxlength="10" >
                    <label for="password">Telefono</label>
                    <span class="lbl-error"></span>
                </div>	
				<br>
			<span class="text-danger" style="color:#8E7B00;font-size: 15px;"><?php echo $message; ?></span>
			<div class="form-group" align="center">
				<input type="submit" name="register" class="button" value="Quiero Unirme!"  />
			</div>
			<br>
			<div align="center">
			<h6>&iquest;Ya tienes una cuenta&#63;<a href="login.php" class="txt"> Haz click aqu&iacute; para iniciar sesi&oacute;n.</a></h6>
			</div>
				</form>
				</div>
			</div>
		</div>
    </body>  
</html>
