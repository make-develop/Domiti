<!--
//login.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
	header('location:index.php');
}

if(isset($_POST['login']))
{
	$query = "
		SELECT * FROM login 
  		WHERE username = :username
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':username' => $_POST["username"]
		)
	);	
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if(password_verify($_POST["password"], $row["password"]))
			{
				$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['username'] = $row['username'];
				$sub_query = "
				INSERT INTO login_details 
	     		(user_id) 
	     		VALUES ('".$row['user_id']."')
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute();
				$_SESSION['login_details_id'] = $connect->lastInsertId();
				header('location:index.php');
			}
			else
			{
				$message = '<label>Contraseña incorrecta</label>';
			}
		}
	}
	else
	{
		$message = '<label>Teléfono incorrecto</label>';
	}
}


?>

<html>  
    <head>  
    
        <title>Domiti</title>  
                <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  			<link rel="stylesheet" href="./assets/css/estilos.css">
  				<link rel="stylesheet" href="./assets/css/caja.css">
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


    
                      <li><a href="#">&iquest;Tienes un local&#63; Unete a nosotros!</a>

                          <ul>
                          </ul>
                      </li>
IMAGEN
                  </ul>   


</header>
<!--final cabecera-->
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Domiti</h3><br />
			<br />
			<div class="panel panel-default">
  				<div class="panel-heading">Iniciar Sesión</div>
				<div class="panel-body">
					<form method="post">
					    
					     <div class="input-field col s12">
                    <input id="password" type="tel" name="username" class="validate" required="required" class="form-control" minlength="10" maxlength="10">
                    <label for="password">Tel&eacute;fono</label>
                   <span class="lbl-error"></span>

                   </div>
					<div class="input-field col s12">
                    <input id="password" type="password" name="password" class="validate" required="required" class="form-control">
                    <label for="password">Contraseña</label>
                  
                   <span class="lbl-error"></span>

                   </div>
                   
						<br>
			<span class="text-danger" style="color:#8E7B00;font-size: 12px;"><?php echo $message; ?></span>
			<br>

						<div class="form-group" align="center">
							<input type="submit" name="login" class="btn btn-info" value="Iniciar Sesion"  />
						</div>
						<br>
						<br>
						<div align="center">
							<a href="register.php">¿Aún no estás registrado? Haz click aquí para registrarte.</a>
						</div>
					</form>
					<br />
					<br />
					<br />
					<br />
				</div>
			</div>
		</div>

    </body>  
</html>