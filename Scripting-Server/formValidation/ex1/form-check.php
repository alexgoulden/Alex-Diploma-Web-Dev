
<!DOCTYPE html>
<html>
<head>
	<title>Pick a day Poem</title>
</head>
<body>
<?php 
$days = $_POST['days'];
switch ($days) {
	case "monday":
	echo "<p>Laught on a monday, laugh fo danger</p>";
	break;
	case "tuesday":
	echo "<p>Laught on a tuesday, kiss a stranger</p>";
	break;
	case "wednesday":
	echo "<p>Laught on a wednesday, laugh for a letter</p>";
	break;
	case "thursday":
	echo "<p>Laught on a thursday, something better</p>";
	break;
	case "friday":
	echo "<p>Laught on a friday, laugh for</p>";
	break;
	case "saturday":
	echo "<p>Laught on a saturday, laugh for sorrow</p>";
	break;
	case "sunday":
	echo "<p>Laught on a sunday, joy tomorrow</p>";
	break;
}
?>
<form action="index.php">
<input action type="submit" name="back">
</form>
</body>
</html>