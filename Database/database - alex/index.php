<!DOCTYPE html>
<html>
<head>
	<title>Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<table>
<?php
	require_once('config.php');

	/* $sql = "SELECT * FROM employees"; */

	$result = mysqli_query($conn, "CALL DisplayAllEmployees");

	if (mysqli_num_rows($result) > 0) {
		//display data from each row in table
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo " <td>" . $row["ID"]. "</td>" ;
			echo " <td>" . $row["LastName"]. "</td>" ;
			echo " <td>" . $row["FirstName"]. "</td>" ;
			echo " <td>" . $row["BirthDate"]. "</td>" ;
			echo " <td>" ;
			echo "<img class=profile src=emp-photo-lo/" . $row["Photo"]. ">" ;
			echo "</td>" ;
			echo " <td>" . $row["Notes"]. "</td>" ;
			echo " <td><a href='update.php?id=" . $row["ID"]. "'>Edit</a></td>";
			echo " <td><a href='delete.php?id=" . $row["ID"]. "'>Delete</a></td>" ;
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
			<h1 class="form-title">Insert into table</h1>
				<form name="contact-form" action="insert.php" method="post" id="contact-form">
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