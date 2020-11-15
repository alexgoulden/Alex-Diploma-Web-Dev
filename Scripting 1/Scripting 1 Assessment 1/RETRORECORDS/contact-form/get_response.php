<?php 
require_once("config.php");
if((isset($_POST['your_name'])&& $_POST['your_name'] !='') && (isset($_POST['your_email'])&& $_POST['your_email'] !='') && (isset($_POST['your_artist'])&& $_POST['your_artist'] !='') && (isset($_POST['album'])&& $_POST['album'] !=''))
{

$yourName = $conn->real_escape_string($_POST['your_name']);
$yourEmail = $conn->real_escape_string($_POST['your_email']);
$yourArtist = $conn->real_escape_string($_POST['your_artist']);
$album = $conn->real_escape_string($_POST['album']);
$sql="INSERT INTO users (name, email, artist, album) VALUES ('".$yourName."','".$yourEmail."', '".$yourArtist."', '".$album."')";
if(!$result = $conn->query($sql)){
die('There was an error running the query [' . $conn->error . ']');
}
else
{
echo "Thank you! We will contact you soon";
}
}
else
{
echo "Please tell us what artist and album you're looking for";
}
?>
