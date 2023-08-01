<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Response</title>
	<link rel="stylesheet" type="text/css" href="response.css">
</head>
<body>
<?php 
//Create variables for our posted values
$title = $_POST['title'];
$stuNum = $_POST['stuNum'];
$service = $_POST['service'];
$comments = $_POST['comments'];
//Print the recived data:
echo"<h1>Class: $title</h1>
<h2>Student number: $stuNum</h2>
<p>You stated that you thought the class was $service and added: <br>$comments</p>";
?>
</body>
</html>