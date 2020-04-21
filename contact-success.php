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
            <li>
				<a href="login.php">Iniciar Sesion!
				</a>

        <ul>
        </ul>
            </li>
        </ul>   
</header>
<script type="text/javascript">
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
</script>

<!--final cabecera-->
<body onload="sinVueltaAtras()" onpageshow="if (event.persisted) sinVueltaAtras()" onunload="">  
        <div class="container">
			<br />
			<div class="hero-title" align="center">
			<h2 class="hero-title"> ¡Registro <strong>Exitoso</strong>!</h2>
			<br>
            </div>
			<div class="panel panel-default">
				<div class="panel-body">
				<div align="center">
				<img src="./assets/img/check.png" alt="" width="100">
				</div>
				<br>
					<h5 align="center">En breve nos <strong>comunicaremos contigo</strong> !</h5>
					<br>
					<div class="form-group" align="center">
							<input type="submit" class="button" value="Entendido!" onclick="location.href='login.php'" />
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
