<!--
//index.php
!-->
<?php
include('database_connection.php');
/* establecer el limitador de caché a 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* establecer la caducidad de la caché a 30 minutos */
session_cache_expire(30);
$cache_expire = session_cache_expire();
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
<section class="hero">
        <div class="hero-title">
			<h1 class="hero-title" align="center"> ¡Pide lo que <strong>necesites</strong>!</h1> 
			<br>
			<h4 align="center"> Con nuestro <strong>servicio</strong> de entregas te lo <strong>llevamos</strong></h4>
			<br>
        </div>
    </section>
<section id="categorias" class="categorias">
	<h2 align="center">Lo <strong>mejor</strong> de Sogamoso en <strong>Domiti</strong></h2>
<script type="text/javascript">
	function showAndroidToast(toast) {
		Android.showToast(toast);
		
	}
</script>
	<ul id="categorias-list"> 
		<li align="center" class="deports">
			<a href="indexfavor.php">
				<span>
					<img width="80" src="./assets/img/deportes.png" alt="Deportes">
				</span>
					<p class="subtitle">Favores</p>
			</a>
		</li> 
	<li align="center">
		<a href="" onClick="showAndroidToast('Proximamente!')">
			<span>
				<img width="80" src="./assets/img/res.png" alt="Restaurantes">
			</span>
				<p class="subtitle">Restaurantes</p>
		</a>
	</li>  
	<li align="center">
		<a href="" onClick="showAndroidToast('Proximamente!')">
			<span>
				<img width="80" src="./assets/img/farma.png" alt="Farmacia">
			</span>
				<p class="subtitle">Farmacia</p>
		</a>
	</li>  
	<li align="center">
		<a href="" onClick="showAndroidToast('Proximamente!')">
			<span>
				<img width="80" src="./assets/img/licor.png" alt="Licores">
			</span>
				<p class="subtitle">Licores</p>
		</a>
	</li> 
</ul>
</section>

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
<!--FIN FOOTER-->

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