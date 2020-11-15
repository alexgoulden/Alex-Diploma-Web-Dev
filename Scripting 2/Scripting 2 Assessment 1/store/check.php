<?php 
session_start(); ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

//connect to database
$mysqli = mysqli_connect("localhost", "root", "", "php-store");
// $st_id="";
$display_block = "<h1>Your Shopping Cart</h1>";

//check for cart items based on user session id
$get_cart_sql = "SELECT st.id, si.item_title, si.item_price, si.cur_quant,
                  st.sel_item_qty, st.sel_item_size, st.sel_item_color FROM
                  store_shoppertrack AS st LEFT JOIN store_items AS si ON
                  si.id = st.sel_item_id WHERE session_id=
                  '".$_COOKIE['PHPSESSID']."'";
$get_cart_res = mysqli_query($mysqli, $get_cart_sql)
               or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_cart_res) < 1 ) {
   //print message
   $display_block .="<p>You have no items in your cart.
                     Please <a href=\"seestore.php\">continue to shop</a>!</p>";
   } else {
      //get info and build cart display
      $display_block .= <<<END_OF_TEXT
      <table>
      <tr> 
      <th>Title</th>
      <th>Size</th>
      <th>Color</th>
      <th>Price</th>
      <th>Qty</th>
      <th>Total Price</th>
      <th>Action</th>
      </tr>
END_OF_TEXT;

      while ($cart_info = mysqli_fetch_array($get_cart_res)) {
         $id = $cart_info['id'];
         $item_title = ($cart_info['item_title']);
         $item_price = $cart_info['item_price'];
         $item_qty = $cart_info['sel_item_qty'];
         $new_qty = $cart_info['cur_quant'] -$cart_info['sel_item_qty'];
         $item_color = $cart_info['sel_item_color'];
         $item_size = $cart_info['sel_item_size'];
         $total_price = sprintf("%.02f", $item_price * $item_qty);
         $subtotal = sprintf("%.02f", $total_price);

         if($cart_info['cur_quant'] >= $cart_info['sel_item_qty']) {
            $update_quant = "UPDATE store_items SET cur_quant = '".$new_qty."' WHERE '".$id."' = store_items.id AND cur_quant > '".$new_qty."'";
            
            $get_update_res = mysqli_query($mysqli, $update_quant) or die(mysqli_error($mysqli));
            } else {
               echo "Need to put ".$cart_info['item_title']." on back order"; 
         }
         $display_block .=<<<END_OF_TEXT
         <tr>
         <td>$item_title <br></td>
         <td>$item_size <br></td>
         <td>$item_color <br></td>
         <td>\$ $item_price <br></td>
         <td>$item_qty <br></td>
         <td>\$ $total_price <br></td>
         <td><a href="removefromcart.php?id=$id">remove</a></td>
         </tr>
END_OF_TEXT;
      }

      $display_block .= "<tr> <td colspan=5>Total</td> <td>\$ $subtotal</td> <td></td> </tr> </table>";
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>My Store</title>
   <style>
   body{font-family:Arial, Helvetica, sans-serif; margin: 0; padding: 0;}
      label{
         width:150px;
         float: left;
         padding-right: 5px;
         text-align: right;
      }
      input[type=text], select{padding: 5px; border: 2px solid #ccc;border-radius:5px;margin-bottom:3px;}
      input[type=text]:focus {border-color: #333;}
      input[type=submit] {padding: 5px 15px; background:#ccc; border: 0 none; cursor:pointer; border-radius: 5px; margin-left: 155px;}
      br{clear:left;}
      table{
         border: 1px solid black;
         border-collapse: collapse;
      } 
      th{
         border: 1px solid black;
         padding: 6px;
         font-weight: bold;
         background: #ccc;
         text-align: center;
      }
      td{
         border: 1px solid black;
         padding: 6px;
         vertical-align: top;
         text-align: center;
      }
      </style>
</head>
<body>
   <h1>Checkout Page</h1>

   <?php echo $display_block; ?>

   <p>Done Shopping? Enter your details to complete the order!</p>
      <form action="complete.php" method="POST">

         <label for="name">Your Name:</label>
         <input type="text" name="name" id="name"><br>
         
         <label for="address">Address:</label>
         <input type="text" name="address" id="address"><br>
         
         <label for="city">City:</label>
         <input type="text" name="city" id="city"><br>
         
         <label for="state">State/Territory:</label>
         <input type="text" name="state" id="state"><br>
         
         <label for="zip">POSTCODE:</label>
         <input type="text" name="zip" id="zip"><br>
         
         <label for="tel">Telephone:</label>
         <input type="text" name="tel" id="tel"><br>
         
         <label for="email">Email:</label>
         <input type="text" name="email" id="email"><br>
         
         <label for="cardName">Name On Card:</label>
         <input type="text" name="cardName" id="cardName"><br>

         <label for="expiry">Expiry date of card: </label>
         <?php 
            $years = array();
            echo "<select name='month' id='sel'>";
            for($i=1; $i<=12; $i++) {
               echo "<option value='$i'>$i</option>";
            }
            echo "</select>";

            $years = array();
            echo "<select name='year'>";
            for ($i = 2020; $i <2030; $i++) {
               echo "<option value = '$i'> $i</option>";
            }
            echo "</select><br>";
         ?>
         
         <input type="hidden" name="session" value="$_COOKIE['PHPSESSID']">
         <input type="hidden" name="total" value="<?php $subtotal; ?>">
         <input type="submit" name="submit"> 
       
      </form>
      
      <!-- <p>Please <a href="checkoutform.php">Checkout</a>!</p>
      <br> -->
      <p>Please <a href="seestore.php">Continue Shopping</a>!</p>
</body>
</html>

