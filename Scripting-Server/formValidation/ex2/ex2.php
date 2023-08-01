<!DOCTYPE html>
<html>
<head>
	<title>posting</title>
</head>
<body>
<?php

$firstN = $_POST['first_name'];
$lastN = $_POST['last_name'];
$posting = $_POST['posting'];

if (empty($_POST['first_name'])) {
	echo "<p>You need to enter a first name</p>";
} else {
	echo "<p>You entered a first name</p>";
}

if (empty($_POST['last_name'])) {
	echo "<p>You need to enter a last name</p>";
} else {
	echo "<p>You entered a last name</p>";
}
if (empty($_POST['first_name'])) {
	echo "<p> Please enter a comment</p>";
} else {
	echo "<p>You entered a comment name</p>";
}



?>
</body>
</html>