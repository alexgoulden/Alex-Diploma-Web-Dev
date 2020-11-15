<?php 
require_once("config.php");
if((isset($_POST['firstname'])&& $_POST['firstname'] !='') && (isset($_POST['lastname'])&& $_POST['lastname'] !='') && (isset($_POST['birthdate'])&& $_POST['birthdate'] !='') && (isset($_POST['photo'])&& $_POST['photo'] !='') && (isset($_POST['notes'])&& $_POST['notes'] !=''))
{
	$fName = $conn->real_escape_string($_POST['firstname']);
	$lName = $conn->real_escape_string($_POST['lastname']);
	$bDate = $conn->real_escape_string($_POST['birthdate']);
	$p = $conn->real_escape_string($_POST['photo']);
	$n = $conn->real_escape_string($_POST['notes']);
	/* alphnumerical checker */
	if(!ctype_alnum($fName) || !ctype_alnum($lName) || !ctype_alnum($p) || !ctype_alnum($n)) {
		echo "You used non alphnumerical characters, please go back and use only a-z & 0-9";
	} else {
		$safeBirthdate = DateTime::createFromFormat('Y-m-d', $bDate);
		$errorsBirthdate = DateTime::getLastErrors();
		if ($errorsBirthdate['warning_count'] + $errorsBirthdate['error_count'] > 0) {
		   echo 'You did not follow the specified date format YYYY-MM-DD';
		} else {
			$p = $conn->real_escape_string($_POST['photo']) . ".png";
			$sql="INSERT INTO employees (FirstName, LastName, BirthDate, Photo, Notes) VALUES ('".$fName."','".$lName."', '".$bDate."', '".$p."', '".$n."')";

			if(!$result = $conn->query($sql)){
				die('There was an error running the query [' . $conn->error . ']');
			} else {
			    mysqli_close($conn);
			    header('Location: index.php'); 
			    exit;
			}
		}
	}
} else {
	echo "Please provide all required information";
}
?>
