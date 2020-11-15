<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
	<title>RetroRecords Contact</title>
    <link rel="icon" type="image/svg+xml" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="reset.css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="styles.css" media="all">
    <link rel="stylesheet" type="text/css" href="media.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script>
	/* display a confirmation alert to ensure the user knows their data will be validated */
    window.onload = function(){
       document.getElementById('submit_form').onclick = function(e){
       	var name = document.getElementById("your_name").value;
       	var email = document.getElementById("your_email").value; 
       	var artist = document.getElementById("your_artist").value;
       	var album = document.getElementById("album").value;
          return confirm("Is this correct?" + "\nName:" + name + "\nEmail:" + email + "\nArtist:" + artist + "\nAlbum:" + album);

       }
    }
    </script>
</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="feature-text">Find Your Piece of Nostalgia Today!</h1>

			<form name="contact-form" method="post" id="contact-form">
			<div class="form-group">
				<label for="your_name">Name</label>
				<input type="text" class="form-control" name="your_name" id="your_name" placeholder="Name" required>
			</div>

			<div class="form-group">
				<label for="your_email">Email address</label>
				<input type="email" class="form-control" name="your_email" id="your_email" placeholder="Email" required>
			</div>

			<div class="form-group">
				<label for="your_artist">Artist</label>
				<input type="text" class="form-control" name="your_artist" id="your_artist" placeholder="Artist" required>
			</div>

			<div class="form-group">
				<label for="album">Album</label>
				<input type="text" class="form-control" name="album" id="album" placeholder="Album" required> 
			</div>

			<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
			<img src="img/loading.svg" id="loading-img" alt="loading icon">
			</form>
			<div class="response_msg"></div>
		</div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- https://www.cloudways.com/blog/custom-php-mysql-contact-form/ based script-->
<script>
	$(document).ready(function(){
		$("#contact-form").on("submit",function(e){
			e.preventDefault();
	if($("#contact-form [name='your_name']").val() === '')
	{
	$("#contact-form [name='your_name']").css("border","1px solid red");
	}
	else if ($("#contact-form [name='your_email']").val() === '')
	{
	$("#contact-form [name='album']").css("border","1px solid red");
	}
	else
	{
	$("#loading-img").css("display","block");
	var sendData = $( this ).serialize();
	$.ajax({
	type: "POST",
	url: "contact-form/get_response.php",
	data: sendData,
	success: function(data){
	$("#loading-img").css("display","none");
	$(".response_msg").text(data);
	$(".response_msg").slideDown().fadeOut(3000);
	$("#contact-form").find("input[type=text], input[type=email]").val("");
	}
	});
	}
	});
	$("#contact-form input").blur(function(){
	var checkValue = $(this).val();
	if(checkValue != '')
	{
	$(this).css("border","1px solid #eeeeee");
	}
	});
	});

</script>
<!--
	Various testing javascript code
	document.getElementByName("submit_form").onclick = function() {confirmWindow()};

	function confirmWindow() {
		return confirm('Is this good?');
	}

	function check() {
		var txt;
		const checkWindow = return confirm('Is this information correct?');
		txt = "Name:" document.getElementByName('your_name');
		"Email:" document.getElementByName('your_email');
		"Artist:" document.getElementByName('your_artist');
		"Album:" document.getElementByName('album');
	}
-->
</body>
</html>