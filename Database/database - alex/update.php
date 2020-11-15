<?php
$empid = $_GET['id'];

$dbname = "tafe_w3";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<h1>Old Data:</h1>
<table>
<?php
	require_once('config.php');

	/* retrieving the data from the single row to assist in seeing what needs to be changed */
	$olddata = mysqli_query($conn, "SELECT * FROM employees WHERE ID = '".$empid."'");

	if (mysqli_num_rows($olddata) > 0) {
		//display data from row in table
		while ($row = mysqli_fetch_assoc($olddata)) {
			echo "<tr>";
			echo " <td>" . $row["ID"]. "</td>" ;
			echo " <td>" . $row["LastName"]. "</td>" ;
			echo " <td>" . $row["FirstName"]. "</td>" ;
			echo " <td>" . $row["BirthDate"]. "</td>" ;
			echo " <td>" ;
			echo "<img class=profile src=emp-photo-lo/" . $row["Photo"]. ">" ;
			echo "</td>" ;
			echo " <td>" . $row["Notes"]. "</td>" ;
			echo "</tr>"; 
		}
	} else {
		echo 'No Data';
	}

	mysqli_close($conn);
?>
</table>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="form-title">Edit Data</h1>
				<form name="contact-form" action="submit_update.php" method="post" id="contact-form">
				<input type="hidden" name="id" value="<?php echo $empid ; ?>">
				<div class="form-group">
					<label for="firstname">Firstname</label>
					<input type="text" class="form-control" name="firstname" placeholder="Firstname" required>
				</div>
				<div class="form-group">
					<label for="lastname">Lastname</label>
					<input type="text" class="form-control" name="lastname" placeholder="Lastname" required>
				</div>
				<div class="form-group">
					<label for="birthdate">Birthdate YYYY-MM-DD</label>
					<input type="text" class="form-control" name="birthdate" placeholder="YYYY-MM-DD" required>
				</div>
				<div class="form-group">
					<label for="photo">Photo</label>
					<input type="text" class="form-control" name="photo" value="empID#" required>
				</div>
				<div class="form-group">
					<label for="notes">Notes</label>
					<input class="form-control" name="notes" placeholder="Notes" required></textarea> 
				</div>
				<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
				</form>
			<div class="response_msg"></div>
		</div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</body>
</html>