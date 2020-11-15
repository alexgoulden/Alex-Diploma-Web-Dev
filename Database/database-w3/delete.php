<?php

$id = $_GET['id'];
//Connect DB
//Create query based on the ID passed from table
//query : delete where id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "tafe_w3";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM employees WHERE ID = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: index.php'); 
    exit;
} else {
    echo "Error deleting record";
}

?>