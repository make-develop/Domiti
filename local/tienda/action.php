<?php  
 //action.php  
 session_start();  
 include('../../database_connection.php');

 if(isset($_POST["product_id"]))  
 {  
      $order_table = '';  
      $message = '';  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["shopping_cart"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
                {  
                     if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                     {  
                          $is_available++;  
                          $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'product_id'               =>     $_POST["product_id"],  
                          'product_name'               =>     $_POST["product_name"],  
                          'product_price'               =>     $_POST["product_price"],  
                          'product_quantity'          =>     $_POST["product_quantity"],
                          'address'          =>     $_POST["address"],
                          'address2'          =>     $_POST["address2"],
                          'address3'          =>     $_POST["address3"],
                          'address4'          =>     $_POST["address4"], 
                          'addressAditional'          =>     $_POST["addressAditional"],  
                          'propina'          =>     $_POST["propina"],
                          'metodopago'          =>     $_POST["metodopago"]

                     );  
                     $_SESSION["shopping_cart"][] = $item_array;  
                }  
           }  
           else  
           {  
                $item_array = array(  
                     'product_id'               =>     $_POST["product_id"],  
                     'product_name'               =>     $_POST["product_name"],  
                     'product_price'               =>     $_POST["product_price"],  
                     'product_quantity'          =>     $_POST["product_quantity"],
                     'address'          =>     $_POST["address"],
                     'address2'          =>     $_POST["address2"],
                     'address3'          =>     $_POST["address3"],
                     'address4'          =>     $_POST["address4"],  
                     'addressAditional'          =>     $_POST["addressAditional"],  
                     'propina'          =>     $_POST["propina"], 
                     'metodopago'          =>     $_POST["metodopago"]  
                );  
                $_SESSION["shopping_cart"][] = $item_array;  
           }  
      }  
      if($_POST["action"] == "remove")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["product_id"] == $_POST["product_id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     $message = '<label class="text-success">Product Removed</label>';  
                }  
           }  
      }  
      if($_POST["action"] == "quantity_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                {  
                     $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_POST["quantity"];  
                }  
           }  
      } 
      if($_POST["action"] == "address2_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys])  
                {  
                     $_SESSION["shopping_cart"][$keys]['address2'] = $_POST["address2"];  
                }  
           }  
      }  
      if($_POST["action"] == "address_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys])  
                {  
                     $_SESSION["shopping_cart"][$keys]['address'] = $_POST["address"];  
                }  
           }  
      }
      if($_POST["action"] == "address3_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys])  
                {  
                     $_SESSION["shopping_cart"][$keys]['address3'] = $_POST["address3"];  
                }  
           }  
      }  
      if($_POST["action"] == "address4_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys])  
                {  
                     $_SESSION["shopping_cart"][$keys]['address4'] = $_POST["address4"];  
                }  
           }  
      } 
      if($_POST["action"] == "addressAditional_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys])  
                {  
                     $_SESSION["shopping_cart"][$keys]['addressAditional'] = $_POST["addressAditional"];  
                }  
           }  
      } 
      if($_POST["action"] == "propina_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys])  
                {  
                     $_SESSION["shopping_cart"][$keys]['propina'] = $_POST["propina"];  
                }  
           }  
      } 
      if($_POST["action"] == "metodopago_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys])  
                {  
                     $_SESSION["shopping_cart"][$keys]['metodopago'] = $_POST["metodopago"];  
                }  
           }  
      }  
      $order_table .= '  
           '.$message.'  
           <table class="table table-bordered">  
                <tr>  
                     <th width="40%">Product Name</th>  
                     <th width="10%">Quantity</th>  
                     <th width="20%">Price</th>  
                     <th width="15%">Total</th>  
                     <th width="5%">Action</th>  
                </tr>  
           ';  
      if(!empty($_SESSION["shopping_cart"]))  
      {  
           $total = 0;  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $order_table .= '  
                     <tr>  
                     
                          <td>'.$values["product_name"].'</td>  
                          <td><input type="number" name="quantity[]" id="quantity'.$values["product_id"].'" value="'.$values["product_quantity"].'" class="form-control quantity" data-product_id="'.$values["product_id"].'" /></td>  
                          
                          <td align="right">$ '.$values["product_price"].'</td>  
                          <td align="right">$ '.number_format($values["product_quantity"] * $values["product_price"], 2).'</td>  
                          <td><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'">Remove</button></td>  
                         
                     </tr>  
                ';  
                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
           }  
           $order_table .= '  
                <tr>  
                     <td colspan="3" align="right">Total</td>  
                     <td align="right">$ '.number_format($total, 2).'</td>  
                     <td></td>  
                </tr>  
                <tr>
                <td>
                <select name="address"  class="form-control address" id="address'.$values["product_id"].'" class="form-control address" data-product_id="'.$values["product_id"].'" >
                <option value="'.$values["address"].'">'.$values["address"].'</option> 
                <option value="Calle">Calle</option> 
                <option value="Carrera" >Carrera</option>
                </select>
                </td>
                <td><input type="number" name="address2[]" id="address2'.$values["product_id"].'" value="'.$values["address2"].'" class="form-control address2" data-product_id="'.$values["product_id"].'" /></td>
                <td><input type="text" name="address3[]" id="address3'.$values["product_id"].'" value="'.$values["address3"].'" class="form-control address3" data-product_id="'.$values["product_id"].'" /></td>
                <td><input type="text" name="address4[]" id="address4'.$values["product_id"].'" value="'.$values["address4"].'" class="form-control address4" data-product_id="'.$values["product_id"].'" /></td>
               
                </tr>
                <tr>
                <td><input type="text" name="addressAditional[]" id="addressAditional'.$values["product_id"].'" value="'.$values["addressAditional"].'" class="form-control addressAditional" data-product_id="'.$values["product_id"].'" /></td>
                </tr>
                <tr>
                <td><input type="number" name="propina[]" id="propina'.$values["product_id"].'" value="'.$values["propina"].'" class="form-control propina" data-product_id="'.$values["product_id"].'" /></td>
                </tr>
                <tr>
                <td>
                <select name="metodopago"  class="form-control metodopago" id="metodopago'.$values["product_id"].'" class="form-control metodopago" data-product_id="'.$values["product_id"].'" >
                <option value="'.$values["metodopago"].'">'.$values["metodopago"].'</option> 
                <option value="Daviplata">Daviplata</option> 
                <option value="Nequi" >Nequi</option>
                <option value="Efectivo" >Efectivo</option>
                </select>
                </td>
               
                
                </td>
                </tr>
                <tr>  
                     <td colspan="5" align="center">  
                          <form method="post" action="cart.php">  
                               <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                          </form>  
                     </td>  
                </tr>  
           ';  
      }  
      $order_table .= '</table>';  
      $output = array(  
           'order_table'     =>     $order_table,  
           'cart_item'          =>     count($_SESSION["shopping_cart"])  
      );  
      echo json_encode($output);  
 }  
 ?>