<?php   
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {   
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$_GET["id"]] = $item_array;  
           }  
           else  
           {  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
			   {  
					if($values["item_id"] == $_GET["id"])  
					{  
						$old_quantity = $values["item_quantity"]; 
						$item_array = array(  
							 'item_id'               =>     $_GET["id"],  
							 'item_name'               =>     $_POST["hidden_name"],  
							 'item_price'          =>     $_POST["hidden_price"],  
							 'item_quantity'          =>     $_POST["quantity"] + $old_quantity  
						);  
						$_SESSION["shopping_cart"][$keys] = $item_array;  
					}  
			   }  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "remove")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {
					if($values["item_quantity"] > 1){
						$name = $values["item_name"];
						$price = $values["item_price"];
						$new=$values["item_quantity"]-1;
						
						$_SESSION["shopping_cart"][$keys] = array(  
																		'item_id'               =>     $_GET["id"],  
																		'item_name'               =>     $name,  
																		'item_price'          =>     $price,  
																		'item_quantity'          =>     $new  
																   );
						
					}else{
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>'; 
					}
                }  
           }  
      }
	  if($_GET["action"] == "add")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {
						$name = $values["item_name"];
						$price = $values["item_price"];
						$new=$values["item_quantity"]+1;
						
						$_SESSION["shopping_cart"][$keys] = array(  
																		'item_id'               =>     $_GET["id"],  
																		'item_name'               =>     $name,  
																		'item_price'          =>     $price,  
																		'item_quantity'          =>     $new  
																   );
					 
                }  
           }  
      } 
	  if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {
					unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("'.$values["item_name"].' Removed")</script>';
					 
                }  
           }  
      }   
 }   
 ?>