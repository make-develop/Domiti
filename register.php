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
			$message .= '<p>Tel&eacute;fono ya esta registrado</p>';
		}
		else
		{
			if(empty($username))
			{
				$message .= '<p>Tel&eacute;fono es requerido</p>';
			}
			if(empty($password))
			{
				$message .= '<p>Contrase���a es requerida</p>';
			}
			else
			{
				if($password != $_POST['confirm_password'])
				{
					$message .= '<p>Las contrase���as no coinciden</p>';
				}
			}
			
	
			
			if($message == '')
			{
				$data = array(
					':username'		=>	$username,
					':name'		=>	$name,
					':address'		=>	$address,
					':addressAditional'		=>	$addressAditional,
					':password'		=>	password_hash($password, PASSWORD_DEFAULT)
				);

				$query = "
				INSERT INTO login
				(username, name, address, addressAditional, password) 
				VALUES (:username,:name,:address,:addressAditional, :password)
				";
				$statement = $connect->prepare($query);
				if($statement->execute($data))
				{
					$message = "<p>Registro Exitoso!</p>";
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
                      <li><a href="contact.php">&iquest;Tienes un local&#63; Unete a nosotros!</a>

                          <ul>
                          </ul>
                      </li>
                  </ul>   


</header>
<!--final cabecera-->
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Domiti</a></h3>
			<div class="panel panel-default">
  				<div class="panel-heading">Registrarse</div>
				<div class="panel-body">
					<form method="post">
						

	            <div class="input-field col s12">
                    <input id="password" type="tel" name="username" class="validate" required="required" class="form-control" minlength="10" maxlength="10">
                    <label for="password">Tel&eacute;fono</label>
                   <span class="lbl-error"></span>

				   </div>
				   <div class="input-field col s12">
                    <input id="password" type="text" name="name" class="validate" required="required" class="form-control" minlength="5" maxlength="30">
                    <label for="password">Nombres</label>
                   <span class="lbl-error"></span>

				   </div>
				   
				   <div class="input-field col s12">
                    <input id="password" type="text" name="address" class="validate"  class="form-control" minlength="5" maxlength="30">
                    <label for="password">Direccion de entrega</label>
                   <span class="lbl-error"></span>

				   </div>
				   <div class="input-field col s12">
                    <input id="password" type="text" name="addressAditional" class="validate"  class="form-control" minlength="5" maxlength="30" >
                    <label for="password">Direccion Adicional: Barrio, Piso, Apto</label>
                   <span class="lbl-error"></span>

                   </div>
                   
					<div class="input-field col s12">
                    <input id="password" type="password" name="password" class="validate" required="required" class="form-control">
                    <label for="password">Contraseña</label>
                  
                   <span class="lbl-error"></span>

                   </div>
                   
                           
					<div class="input-field col s12">
                    <input id="password" type="password" name="confirm_password" class="validate" required="required" class="form-control">
                    <label for="password">Confirme contraseña</label>
                  
                   <span class="lbl-error"></span>

                   </div>
			<br>
			<span class="text-danger" style="color:#8E7B00;font-size: 15px;"><?php echo $message; ?></span>
						<div class="form-group" align="center">
							<input type="submit" name="register" class="btn btn-info" value="Registrarme"  />
						</div>
			<br>
						<div align="center">
							<a href="login.php">&iquest;Ya tienes una cuenta&#63; Haz click aqu&iacute; para iniciar sesi&oacute;n.</a>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
