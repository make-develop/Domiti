<?php   
 session_start();  
 include('../../database_connection.php');
 $message = '';
 if(!isset($_SESSION['user_id']))
 {
      header("location:../../login.php");
 }
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Tienda</title>  
           <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
           <meta http-equiv="content-type" content="text/html; charset=utf-8">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <link rel="stylesheet" href="./css/index_styles.css">	

      </head>  

      <!--Inicio cabecera-->	
<header id="main-header">
	<ul class="menu">
		<a href="login.php">
			<img src="./images/logo.png" alt="" width="45px" height="45px" class="logoimg">
		</a>
		<li>
			<a href="logout.php">
				<img src="./images/salir.png" alt="" width="20px" height="30px">
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
           
           <div class="container">  
                <h3 align="center">Tienda</h3><br />  
                <ul class="nav nav-tabs">  
                     <li class="active"><a data-toggle="tab" href="#products">Product</a></li>  
                     <li><a data-toggle="tab" href="#cart">Cart <span class="badge"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?></span></a></li>  
                </ul>  
                <div class="tab-content">  
                     <div id="products" class="tab-pane fade in active">  
                     <?php  
                     $query = "SELECT * FROM tbl_product ORDER BY id ASC";  
                      
                     $statement = $connect->prepare($query);
                     $statement->execute();
                     $result = $statement->fetchAll();
                     foreach($result as $row)
                     {  
                     ?>  
                     <div class="col-md-4" style="margin-top:12px;">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">  
                               <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="number" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control" value="1" />
                        
                               <input type="hidden" name="address2" id="address2<?php echo $row["id"]; ?>" class="form-control" value="<?php echo $_SESSION["address2"]; ?>" />  
                               <input  type="hidden" name="address3" id="address3<?php echo $row["id"]; ?>"  class="form-control"	value="<?php echo $_SESSION['address3']; ?> " > 
                               <input  type="hidden" name="address4" id="address4<?php echo $row["id"]; ?>"  class="form-control"	value="<?php echo $_SESSION['address4']; ?> " > 
                               <input  type="hidden" name="addressAditional" id="addressAditional<?php echo $row["id"]; ?>"  class="form-control"  value="<?php echo $_SESSION['addressAditional']; ?> "  >
                               <input  type="hidden" name="propina" id="propina<?php echo $row["id"]; ?>" class="form-control"  value="0">
                               <input  type="hidden" name="domicilio" id="domicilio<?php echo $row["id"]; ?>" class="form-control"  value="2000">
                     

                               <input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" value="<?php echo $row["price"]; ?>" />  
                               <input type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Add to Cart" />  
                               
                               <select name="address"  class="form-control" id="address<?php echo $row["id"]; ?>" style="visibility:hidden">
					          <option value="<?php echo $_SESSION["address"]; ?> "  selected><?php echo $_SESSION['address']; ?></option> 
					          </select> 
                               <select name="metodopago"  class="form-control" id="metodopago<?php echo $row["id"]; ?>" style="visibility:hidden">
					          <option value="Efectivo "  selected>Efectivo</option> 
					          </select> 
                          </div>  
                     </div>  
                     <?php  
                     }  
                     ?>  
                     </div>  <div id="cart" class="tab-pane fade">  
                          <div class="table-responsive" id="order_table">  
                               <table class="table table-bordered">  
                                    <tr>  
                                         <th width="40%">Product Name</th>  
                                         <th width="10%">Quantity</th>  
                                         <th width="20%">Price</th>  
                                         <th width="15%">Total</th>  
                                         <th width="5%">Action</th>  
                                    </tr>  
                                    <?php  
                                    if(!empty($_SESSION["shopping_cart"]))  
                                    {  
                                         $total = 0;  
                                         foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                         {                                               
                                    ?>  

                                    <tr>  
                                    
                                         <td><?php echo $values["product_name"]; ?></td>  
                                         <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>  
                                         <td align="right">$ <?php echo $values["product_price"]; ?></td>  
                                         <td align="right">$ <?php echo number_format($values["product_quantity"] * $values["product_price"]); ?></td>  
                           
                                         <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>  
                              
                                    </tr>  
                                    <?php  
                                              $total = $total + ($values["product_quantity"] * $values["product_price"]) ;  
                                         }  
                                    ?>  
                                     <tr>
                                    <td colspan="3" align="right">Domicilio</td>  
                                         
                                         <td align="right"></td>
                                         <td></td>  
                                    </tr>
                                    <tr>
                                    <td colspan="3" align="right">Propina</td>  
                                         
                                         <td align="right">$ <?php  $values["propina"]; ?></td>
                                         <td></td>  
                                    </tr>
                                    <tr>  
                                         <td colspan="3" align="right">Total</td>  
                                         
                                         <td align="right">$ <?php echo number_format($total + $values["domicilio"] + $values["propina"]); ?></td>
                                         <td></td>  
                                    </tr>  
                                    <tr>
                                    <td>
                                    <div style="display: none">
                                    <input id="valor" type="number" name="valor" class="form-control valor" value="<?php echo $total; ?>">
                                    </div>
                                    </td>
                                    </tr>
                                   
                                    <tr>  
                                    <td>
                                   <select   name="address"   id="address<?php echo $values["product_id"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control address" >
					          <option  value="<?php echo $values["address"]; ?>"><?php echo $values["address"]; ?></option> 
					          <option value="Calle">Calle</option> 
					          <option value="Carrera">Carrera</option>
					          </select>
                                   </td>
                                    <td>
                                   <input type="number" name="address2[]" id="address2<?php echo $values["product_id"]; ?>" value="<?php echo $values["address2"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control address2" />
                                   </td> 
                                 <td>
                                 <input type="text" name="address3[]" id="address3<?php echo $values["product_id"]; ?>" value="<?php echo $values["address3"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control address3" />
                                 </td>
                                 <td>
                                 <input type="text" name="address4[]" id="address4<?php echo $values["product_id"]; ?>" value="<?php echo $values["address4"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control address4" />
                                 </td>
                                    </tr>  
                                    <tr>
                                    <td>
                                 <input type="text" name="addressAditional[]" id="addressAditional<?php echo $values["product_id"]; ?>" value="<?php echo $values["addressAditional"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control addressAditional" />
                                 </td>
                                    </tr>
                                    <tr>
                                    <td>
                                 <input type="number" name="propina[]" id="propina<?php echo $values["product_id"]; ?>" value="<?php echo $values["propina"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control propina" />
                                 </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    <select   name="metodopago"   id="metodopago<?php echo $values["product_id"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control metodopago" >
					          <option  value="<?php echo $values["metodopago"]; ?>"><?php echo $values["metodopago"]; ?></option> 
					          <option value="Daviplata">Daviplata</option> 
					          <option value="Nequi">Nequi</option>
                                   <option value="Efectivo">Efectivo</option> 
					          </select>
                                   
                                   </td>
                                    </tr>
                                    <tr>
                                   <td>
                                   <input type="number" name="domicilio[]" id="domicilio<?php echo $values["product_id"]; ?>" value="<?php echo $values["domicilio"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control domicilio"  />
                                  
                                   </td>
                                   </tr>
                                    <tr>  
                                         <td colspan="5" align="center">  
                                              <form method="post" action="cart.php">  
                                                   <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                                              </form>  
                                         </td>  
                                    </tr>  
                                    <?php  
                                    }else{
                                         echo "Que esperas para comprar";
                                    }  
                                    ?>  

                                    
                               </table>  
                               
                          </div>  
                     </div>  
                </div>  
           </div>  
           <!---PRUEBA DE FOOTER-->

<!--FIN FOOTER-->
      </body>  
 </html>  
 <script>  
 $(document).ready(function(data){  
      $('.add_to_cart').click(function(){  
           var product_id = $(this).attr("id");  
           var product_name = $('#name'+product_id).val();  
           var product_price = $('#price'+product_id).val();  
           var product_quantity = $('#quantity'+product_id).val();  

           var address = $('#address'+product_id).val();  
           var address2 = $('#address2'+product_id).val();  
           var address3 = $('#address3'+product_id).val(); 
           var address4 = $('#address4'+product_id).val();  
           var addressAditional = $('#addressAditional'+product_id).val();   

           var propina = $('#propina'+product_id).val();   
           var metodopago = $('#metodopago'+product_id).val();   

           var domicilio = $('#domicilio'+product_id).val();   

           var valor = $("input[name=valor]").val();

           var action = "add";  
           if(product_quantity > 0)  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          product_id:product_id,   
                          product_name:product_name,   
                          product_price:product_price,   
                          product_quantity:product_quantity,   
                          address:address,   
                          address2:address2,  
                          address3:address3,  
                          address4:address4,   
                          addressAditional:addressAditional, 
                          propina:propina,  
                          metodopago:metodopago,
                          domicilio:domicilio,
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                          alert("Product has been Added into Cart");  

                           console.log(valor); 
                          if(valor<=2000) {
                              $(".domicilio").val(2000);
                              } else if(valor>=2500 & valor<=3500){
     $(".domicilio").val(2500);
    }else if(valor>=4000 & valor<=5500){
      $(".domicilio").val(2600);
    }else if(valor>=6000 & valor<=7000){
     $(".domicilio").val(2600);
    }else if(valor>=7500 & valor<=8500){
     $(".domicilio").val(2800);
    }else if(valor>=9000 & valor<=10500){
      $(".domicilio").val(2900);
    }else if(valor>=11000 & valor<=12500){
      $(".domicilio").val(3000);
    }else if(valor>=13000 & valor<=14500){
      $(".domicilio").val(3200);
    }else if(valor>=15000 & valor<=16500){
      $(".domicilio").val(3400);
    }else if(valor>=17000 & valor<=18500){
      $(".domicilio").val(3600);
    }else if(valor>=19000 & valor<=20500){
      $(".domicilio").val(3800);
    }else if(valor>=21000 & valor<=23500){

      $(".domicilio").val(4000);
    }else if(valor>=24000 & valor<=28500){

      $(".domicilio").val(4200);
    }else if(valor>=29000 & valor<=31500){
      $(".domicilio").val(4400);
    }else if(valor>=32000 & valor<=38500){
      $(".domicilio").val(4600);
    }else if(valor>=39000 & valor<=43500){
      $(".domicilio").val(4800);
    }else if(valor>=44000 & valor<=50000){

      $(".domicilio").val(5000);
    }else if(valor>=50500 & valor<=80000){

      $(".domicilio").val(5500);
    }else if(valor>=80500 & valor<=100000){

      $(".domicilio").val(8000);
    }else if(valor>=100500){
      $(".domicilio").val(10000);
    }
                     }  
                });  
           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });  
      $(document).on('click', '.delete', function(){  
           var product_id = $(this).attr("id");  
           var action = "remove";  
           if(confirm("Are you sure you want to remove this product?"))  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
      $(document).on('change', '.quantity', function(){  
           var product_id = $(this).data("product_id");  
           var quantity = $(this).val();  

           var valor = $("input[name=valor]").val();
          
       

           var action = "quantity_change";  
           if(quantity != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table); 

                          console.log(valor); 
                          if(valor<=2000) {
                              $(".domicilio").val(2000);
                              } else if(valor>=2500 & valor<=3500){
     $(".domicilio").val(2500);
    }else if(valor>=4000 & valor<=5500){
      $(".domicilio").val(2600);
    }else if(valor>=6000 & valor<=7000){
     $(".domicilio").val(2600);
    }else if(valor>=7500 & valor<=8500){
     $(".domicilio").val(2800);
    }else if(valor>=9000 & valor<=10500){
      $(".domicilio").val(2900);
    }else if(valor>=11000 & valor<=12500){
      $(".domicilio").val(3000);
    }else if(valor>=13000 & valor<=14500){
      $(".domicilio").val(3200);
    }else if(valor>=15000 & valor<=16500){
      $(".domicilio").val(3400);
    }else if(valor>=17000 & valor<=18500){
      $(".domicilio").val(3600);
    }else if(valor>=19000 & valor<=20500){
      $(".domicilio").val(3800);
    }else if(valor>=21000 & valor<=23500){

      $(".domicilio").val(4000);
    }else if(valor>=24000 & valor<=28500){

      $(".domicilio").val(4200);
    }else if(valor>=29000 & valor<=31500){
      $(".domicilio").val(4400);
    }else if(valor>=32000 & valor<=38500){
      $(".domicilio").val(4600);
    }else if(valor>=39000 & valor<=43500){
      $(".domicilio").val(4800);
    }else if(valor>=44000 & valor<=50000){

      $(".domicilio").val(5000);
    }else if(valor>=50500 & valor<=80000){

      $(".domicilio").val(5500);
    }else if(valor>=80500 & valor<=100000){

      $(".domicilio").val(8000);
    }else if(valor>=100500){
      $(".domicilio").val(10000);
    }
                     }  
                     
                  
                });  
                
           }  
      });  
 

      $(document).on('change', '.address2', function(){  
           var product_id = $(this).data("product_id");  
           var address2 = $(this).val();  
           var action = "address2_change";  
           if(address2 != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, address2:address2, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  
      $(document).on('change', 'select[name=address]', function(){  
           var product_id = $(this).data("product_id");  
           var optionSelected = $(this).find("option:selected");
     var address  = optionSelected.val();
     var textSelected   = optionSelected.text();
           var action = "address_change";  
           console.log(address);
           if(address != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, address:address, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  

      $(document).on('change', '.address3', function(){  
           var product_id = $(this).data("product_id");  
           var address3 = $(this).val();  
           var action = "address3_change";  
           if(address3 != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, address3:address3, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  
      $(document).on('change', '.address4', function(){  
           var product_id = $(this).data("product_id");  
           var address4 = $(this).val();  
           var action = "address4_change";  
           if(address4 != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, address4:address4, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  
      $(document).on('change', '.addressAditional', function(){  
           var product_id = $(this).data("product_id");  
           var addressAditional = $(this).val();  
           var action = "addressAditional_change";  
           if(addressAditional != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, addressAditional:addressAditional, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  
      $(document).on('change', '.propina', function(){  
           var product_id = $(this).data("product_id");  
           var propina = $(this).val();  
           var action = "propina_change";  
           if(propina != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, propina:propina, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  



      $(document).on('change', 'select[name=metodopago]', function(){  
           var product_id = $(this).data("product_id");  
           var optionSelected = $(this).find("option:selected");
     var metodopago  = optionSelected.val();
     var textSelected   = optionSelected.text();
           var action = "metodopago_change";  
           console.log(metodopago);
           if(metodopago != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, metodopago:metodopago, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });  

      $(document).on('change', '.domicilio', function(){  
           var product_id = $(this).data("product_id");  
           var domicilio = $(this).val();  
           var action = "domicilio_change";  
           console.log(domicilio);
           if(domicilio != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{product_id:product_id, domicilio:domicilio, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          console.log(domicilio);
                     }  
                });  
           }  
      });  


 });  
 </script>
