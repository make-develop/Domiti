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
<script type="text/javascript">
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
</script>
<!--final cabecera-->

<body onload="sinVueltaAtras()" onpageshow="if (event.persisted) sinVueltaAtras()" onunload="">  
<!--PEDIDO-->
	<section class="hero">
        <div class="hero-title" align="center">
			<h1 class="hero-title"> ¡Tu pedido se ha realizado con <strong>exito</strong>!</h1>
			<br>
            </div>
	</section>
	<section id="categorias" class="categorias">
		<div align="center">
			<img src="./assets/img/check.png" alt="" width="100">
		</div>

		<h2 align="center">Recuerda que puedes comunicarte con tu   <strong>repartidor</strong> en la seccion de  <strong>chats</strong></h2>
		<br>
		<div class="form-group" align="center">
			<input type="submit" class="button" value="Entendido!" onclick="location.href='indexfavor.php'" />
		</div>
	</section>
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