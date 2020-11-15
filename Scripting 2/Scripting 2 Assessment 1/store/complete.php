<?php
session_start();
//connect to the database
$mysqli = mysqli_connect("localhost", "root", "", "php-store");

//check for cart items based on user session id
$get_cart_sql = "SELECT st.id, si.item_title, si.item_price, st.sel_item_qty, st.sel_item_size, st.sel_item_color FROM store_shoppertrack AS st LEFT JOIN store_items AS si ON si.id = st.sel_item_id WHERE session_id= '".$_COOKIE['PHPSESSID']."'";
$get_cart_res = mysqli_query($mysqli, $get_cart_sql) 
               or die(mysqli_error($mysqli));

if(isset($_POST['submit'])) {
//sanitize form data
   $safe_sess = mysqli_real_escape_string($mysqli, $_POST['session']);
   $safe_name = mysqli_real_escape_string($mysqli, $_POST['name']);
   $safe_address = mysqli_real_escape_string($mysqli, $_POST['address']);
   $safe_city = mysqli_real_escape_string($mysqli, $_POST['city']);
   $safe_state = mysqli_real_escape_string($mysqli, $_POST['state']);
   $safe_zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
   $safe_tel = mysqli_real_escape_string($mysqli, $_POST['tel']);
   $safe_email = mysqli_real_escape_string($mysqli, $_POST['email']);
   $safe_cName = mysqli_real_escape_string($mysqli, $_POST['cardName']);

}
$insertIntoOrder_sql = "INSERT INTO store_orders (order_date, order_name, order_address, order_city, order_state, order_zip, order_tel, order_email) VALUES (now(), 
'".$safe_name."', '".$safe_address."', '".$safe_city."', '".$safe_state."', '".$safe_zip."', '".$safe_tel."', '".$safe_email."')"; 
   
$insertIntoCart_res = mysqli_query($mysqli, $insertIntoOrder_sql) or die(mysqli_error($mysqli));

$safe_id = mysqli_insert_id($mysqli);

while ($cart_info = mysqli_fetch_array($get_cart_res)) {
   $id = $cart_info['id'];
   $item_title = $cart_info['item_title'];
   $item_price = $cart_info['item_price'];
   $item_qty = $cart_info['sel_item_qty'];
   $item_color = $cart_info['sel_item_color'];
   $item_size = $cart_info['sel_item_size'];
   $total_price = sprintf("%.02f", $item_price * $item_qty);

   //insert into store_orders_items table
   $insertIntoOrderItems_sql = "INSERT INTO store_orders_items (order_id, sel_item_id, sel_item_qty, sel_item_color, sel_item_size, sel_item_price) 
   VALUES ('".$safe_id."', '".$id."', '".$item_qty."', '".$item_color."', '".$item_size."', '".$item_price."')";
   
   $insertIntoCart_res = mysqli_query($mysqli, $insertIntoOrderItems_sql) or die(mysqli_error($mysqli));
}

//delete cookie
$deleteOrderItems_sql = "DELETE FROM store_shoppertrack"; 
$deleteOrderItems_sql = "DELETE FROM store_shoppertrack WHERE session_id= '".$_COOKIE['PHPSESSID']."'";
$delete_res = mysqli_query($mysqli, $deleteOrderItems_sql) or die(mysqli_error($mysqli));

//close connection to MySql
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Order Completion</title>
</head>
<body>
   <p><a href="seestore.php">Go back to shop</a>!</p>
</body>
</html>