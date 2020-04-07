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
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Domiti</a></h3>
			<div class="panel panel-default">
  				<div class="panel-heading">Registro Exitoso!</div>
				<div class="panel-body">
					
					<p>En breve nos comunicaremos contigo!</p>
					<input type="submit" class="btn btn-info" value="Entendido!" onclick="location.href='login.php'" />

							<a href="login.php">&iquest;Ya tienes una cuenta&#63; Haz click aqu&iacute; para iniciar sesi&oacute;n.</a>
					</form>
				</div>
			</div>
		</div>
    </body>  
</html>
