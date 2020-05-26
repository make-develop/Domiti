<?php  
 //cart.php  
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
           <title>Domiti</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:800px;">  
                <?php  
                if(isset($_POST["place_order"]))  
                {  
                    $sesion=$_SESSION['user_id'];
                    $data = array(
                         ':customer_id'		=>	$sesion,
                         ':order_status' =>	'pending'
                    );

                     $insert_order = "  
                     INSERT INTO tbl_order(customer_id, order_status)  
                     VALUES($sesion, 'pending')  
                     ";  
                     $order_id = "";  
                     $statement = $connect->prepare($insert_order);
                     $result = $statement->fetchAll();
               
                     if($statement->execute($data))  
                     {  
                          $order_id = $connect->lastInsertId(); 
                     }  
        
                     $_SESSION["order_id"] = $order_id;  

                     $order_details = "";  
                     foreach($_SESSION["shopping_cart"] as $keys => $values)  
                     {  

                         $datadetails = array(
                              ':order_id'		=>	$order_id,
	                         ':product_name'	=>	$values["product_id"],
	                         ':product_price'	=>	$values["product_price"],
                              ':product_quantity' =>	$values["product_quantity"],
                              ':address' =>	$values['address'],
                              ':address2' =>	$values['address2'],
                              ':address3' =>	$values['address3'],
                              ':address4' =>	$values['address4'],
                              ':addressAditional' =>	$values['addressAditional'],
                              ':propina' =>	$values['propina'],
                              ':metodopago' =>	$values['metodopago']
                         );
     
                         

                          $order_details .= "  

                          INSERT INTO tbl_order_details(order_id, product_name, product_price, product_quantity, address, address2,address3, address4, addressAditional, propina, metodopago )  
                          VALUES('".$order_id."', '".$values["product_id"]."', '".$values["product_price"]."', '".$values["product_quantity"]."','".$values["address"]."','".$values["address2"]."','".$values["address3"]."','".$values["address4"]."','".$values["addressAditional"]."','".$values["propina"]."','".$values["metodopago"]."');  
                          ";  
                     }  

                     $statement = $connect->prepare($order_details);
                     $result = $statement->fetchAll();


                     if($statement->execute($datadetails))  
                     {  
                          unset($_SESSION["shopping_cart"]);  
                          echo '<script>alert("You have successfully place an order...Thank you")</script>';  
                          echo '<script>window.location.href="cart.php"</script>';  
                     }  
                }  
                if(isset($_SESSION["order_id"]))  
                {  
                     $customer_details = '';  
                     $order_details = '';  
                     $total = 0;  
                     $query = '  
                     SELECT * FROM tbl_order  
                     INNER JOIN tbl_order_details  
                     ON tbl_order_details.order_id = tbl_order.order_id  
                     INNER JOIN tbl_product  
                     ON tbl_product.id = tbl_order_details.product_name 
                     INNER JOIN login  
                     ON login.user_id = tbl_order.customer_id  
                     WHERE tbl_order.order_id = "'.$_SESSION["order_id"].'"
                     
                     ';  
                     $statement = $connect->prepare($query);
                     $statement->execute();
                     $result = $statement->fetchAll();
                     foreach($result as $row)
                     {  
                          $customer_details = '  
                          <label>'.$row["username"].'</label>  
                          <p>'.$row["names"].'</p>   
                         
                          ';  
                          $order_details .= "  
                               <tr>  
                                    <td>".$row["name"]."</td>  
                                    <td>".$row["product_quantity"]."</td>   
                                    
                                    <td>".$row["product_price"]."</td>  
                                    <td>".number_format($row["product_quantity"] * $row["product_price"], 2)."</td>  
                                    <td>".$row["address2"]."</td> 
                               </tr>  
                          ";  
                          $total = $total + ($row["product_quantity"] * $row["product_price"]);  
                     }  
                     echo '  
                     <h3 align="center">Order Summary for Order No.'.$_SESSION["order_id"].'</h3>  
                     <div class="table-responsive">  
                          <table class="table">  
                               <tr>  
                                    <td><label>Customer Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>'.$customer_details.'</td>  
                               </tr>  
                               <tr>  
                                    <td><label>Order Details</label></td>  
                               </tr>  
                               <tr>  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr>  
                                                   <th width="50%">Product Name</th>  
                                                   <th width="15%">Quantity</th>  
                                                   <th width="15%">Price</th>  
                                                   <th width="20%">Total</th>  
                                              </tr>  
                                              '.$order_details.'  
                                              <tr>  
                                                   <td colspan="3" align="right"><label>Total</label></td>  
                                                   <td>'.number_format($total, 2).'</td>  
                                              </tr>  
                                         </table>  
                                    </td>  
                               </tr>  
                          </table>  
                     </div>  
                     ';  
                }  
                ?>  
           </div>  
      </body>  
 </html> 