<?php
include('database_connection.php');
session_start();
$message = '';
if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}



?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta http-equiv="Content-Type"  content="text/html">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Domiti</title>
    <link rel="stylesheet" href="./assets/css/pedidos_style.css">
		<link rel="stylesheet" href="./assets/css/tabla.css">
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
		<p class="hola">Hola! <?php echo $_SESSION['username']; ?></p>
		</li>
	</ul>   
</header>
<!--final cabecera-->
<body>

<div id="bed">
        <h3>Tus pedidos entregados</h3>
        <table class="rwd-table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
         

                $query = "
                SELECT * 
                FROM orders 
                JOIN login ON login.user_id = orders.user_id 
                WHERE orders.user_id != '".$_SESSION['user_id']."' AND orders.estado = 6 AND from_user_id= '".$_SESSION['user_id']."' OR from_user_id = 0  ORDER BY updated_at DESC
                ";
                
                $statement = $connect->prepare($query);
                
                $statement->execute();
                
                $result = $statement->fetchAll();
                
                if(!empty($result)){
                foreach($result as $row)
                {
                    $id = $row['id'];
                    $es = $row['estado'];    
                    $sesion=$_SESSION['user_id'];
                    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
                    $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);
                  $nombrepedido = $row['name'];
                  $celularpedido = $row['username'];
                    $favor = $row['favor'];
                    $valor = $row['valor'];
                  $address = $row['address'];
                  $address2 = $row['address2'];
                  $address3 = $row['address3'];
                  $address4 = $row['address4'];
                    $addressAditional = $row['addressAditional'];
                    $propina = $row['propina'];
                    $metodopago = $row['metodopago'];
                    $domicilio = $row['domicilio'];
                    $total = $row['total'];     
                    setlocale(LC_TIME, 'spanish');       
                    setlocale(LC_TIME, 'es_ES.UTF-8');      
                    $timeupdate = $row['updated_at'];  
                    $update_at = strftime("%H:%m el %A <br> %d de %B",strtotime($timeupdate));
                    $timecreate = $row['created_at'];
                    $create_at = strftime("%A <br> %d de %B",strtotime($timecreate));
                    $create_athora = strftime("%H:%m",strtotime($timecreate));
                    $create_atfecha = strftime("%d de %B del %Y",strtotime($timecreate));
                    

                    if($es == '0')
                    {
                        $es = '<button  class="label label-danger" data-id="' . $row['id'] . '" >No tomado</button>';
                    }
                    else if($es == '1')
                    {
                        $es = '<button class="label label-success" data-id="' . $row['id'] . '" >Tomado</button>';
                    }else if($es=='2'){
                        $es = '<button class="recogido" data-id="' . $row['id'] . '" >Pedido Recogido</button>';
                    }else if($es=='3'){
                    $es = '<button class="camino" data-id="' . $row['id'] . '" >Voy en camino</button>';
                    }else if($es=='4'){
                        $es = '<button class="cinco" data-id="' . $row['id'] . '" >Cinco Minutos</button>';
                    }else if($es=='5'){
                            $es = '<button class="afuera" data-id="' . $row['id'] . '" >Estoy Afuera</button>';
                    }else if($es=='6'){
                        $es = '<button class="entregado" data-id="' . $row['id'] . '" >Entregado</button>';
                    }	
                    ?>                
                <tr id="<?php echo $row['id']; ?>">
                <th data-target="update_at" width="20%" ><?php echo $update_at; ?></th>
                <td data-target="favor"><?php echo $favor; ?></td>
                <td data-target="address"><?php echo $address.' '.$address2.' # '.$address3.'-'.$address4; ?></td>
                <td data-target="estado" style="display:none;"><?php echo $es; ?></td>
                <td data-target="nombrepedido" ><?php echo $nombrepedido; ?></td>
                <td data-target="valor" style="display:none;"><?php echo $valor; ?></td>
                <td data-target="addressAditional" style="display:none;"><?php echo $addressAditional; ?></td>
                <td data-target="propina" style="display:none;"><?php echo $propina; ?></td>
                <td data-target="metodopago" style="display:none;"><?php echo $metodopago; ?></td>
                <td data-target="domicilio" style="display:none;"><?php echo $domicilio; ?></td>
                <td data-target="total" style="display:none;"><?php echo $total; ?></td>
                <td data-target="create_at" style="display:none;"><?php echo $create_at; ?></td>
                <td data-target="create_athora" style="display:none;"><?php echo $create_athora; ?></td>
                <td data-target="create_atfecha" style="display:none;"><?php echo $create_atfecha; ?></td>
                
                <td><button class="button"  data-role="update" data-id="<?php echo $row['id']; ?>">Ver pedido</button></td>
            </tr>
            <?php  }}else{
                    echo '<h3 align="center">No tienes pedidos entregados. <br>
                    <div align="center">
                    <img src="./assets/img/deportes.png" alt="" width="60%" height="60%" class="outimg">
                    </div>
                    <strong>¿Que esperas para realizar pedidos!?</strong></h3>';
                } ?>
            </tbody>
        </table>
    </div>

    <!-- Trigger the modal with a button -->
 	<!---PRUEBA DE FOOTER-->
   <footer id="foot">
<ul class="menu">
<a href="index.php">
	<img src="./assets/img/home.png" alt="" width="45px" height="45px" class="homeimg">
</a>

<li>

</li>
<li>
</li>
<li>
<a href="pedidosrepartidor.php">
<img src="./assets/img/orderpurchasestart.png" alt="" width="40px" height="40px" class="imgiconp" >
</a>
</li>
</ul>  
</footer>
<!--fIN-->
<!--fIN-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="create_atfecha" class="modal-title"></h4> 
      </div>
      <div class="modal-body">
        <div class="form-group">
           <h4 id="favor" class="favor"></h4>
        </div>
        <div class="form-group">
        <h5>Cliente: <h4 id="nombrepedido"></h4></h5> 
        </div>
        <div class="form-group">
        <h5>Direccion<h4 id="address"></h4></h5> 
        </div>
        <div class="form-group">
        <h5> <h4 id="addressAditional"></h4></h5> 
        </div>
        <div class="form-group">
        <h5>Pedido: <h4 id="create_athora"></h4></h5> 
        </div>
        <div class="form-group">
        <h5>Entregado: <h4 id="update_at"></h4></h5> 
        </div>
        <div class="form-group">
        <h5>Metodo de pago <h4 id="metodopago"></h4></h5> 
        </div>
        <table class="form-group">
        <tr>
        <th>Producto</th>
        <th><h4 id="valor"></h4></th>
        </tr>
        <tr>
        <th>Propina</th>
        <th><h4 id="propina"></h4> </th>
        </tr>
        <tr>
        <th>Domicilio</th>
        <td><h4 id="domicilio"></h4> </td>
        </tr>
        <tr>
        <th><h4>Total</h4></th>
        <td><h4 id="total"></h4> </td>
        </tr>
        </table>
        <label id="estado" class="good"></label> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
</body>
<script>
    $(document).ready(function(){
        $(document).on('click','button[data-role=update]',function(){
            var id = $(this).data('id');
            var favor = $('#'+id).children('td[data-target=favor]').text();
            var nombrepedido = $('#'+id).children('td[data-target=nombrepedido]').text();
            var address = $('#'+id).children('td[data-target=address]').text();
            var addressAditional = $('#'+id).children('td[data-target=addressAditional]').text();
            var create_at = $('#'+id).children('td[data-target=create_at]').text();
            var update_at = $('#'+id).children('th[data-target=update_at]').text();
            var valor = $('#'+id).children('td[data-target=valor]').text();
            var propina = $('#'+id).children('td[data-target=propina]').text();
            var domicilio = $('#'+id).children('td[data-target=domicilio]').text();
            var total = $('#'+id).children('td[data-target=total]').text();
            var estado = $('#'+id).children('td[data-target=estado]').text();
            var metodopago = $('#'+id).children('td[data-target=metodopago]').text();
            var create_athora = $('#'+id).children('td[data-target=create_athora]').text();
            var create_atfecha = $('#'+id).children('td[data-target=create_atfecha]').text();

            $('#favor').text(favor);
            $('#nombrepedido').text(nombrepedido);
            $('#address').text(address);
            $('#addressAditional').text(addressAditional);
            $('#create_at').text(create_at);
            $('#update_at').text(update_at);
            $('#valor').text("$"+valor);
            $('#propina').text("$"+propina);
            $('#domicilio').text("$"+domicilio);
            $('#total').text("$"+total);
            $('#estado').text(estado);
            $('#metodopago').text(metodopago);
            $('#create_athora').text(create_athora);
            $('#create_atfecha').text("Tu pedido - "+create_atfecha);
            
            $('#myModal').modal('toggle');
        });
    });

</script>

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border: 1px ;
  border-radius: 10px;
}
.form-group{
  border-bottom:solid 1px grey;
  width:100%;
}
.good{
  color: white;
  width:100%;
  background-color: #4CAF50;
  display: inline-block;
  margin: 4px 2px;
  padding: 10px 32px;
}
.favor{
  text-align: center;
}
.derecha{
  text-align: right;
}
</style>


</html>