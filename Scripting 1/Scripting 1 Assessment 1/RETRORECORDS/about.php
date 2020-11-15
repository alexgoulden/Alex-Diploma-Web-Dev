<!DOCTYPE html>
<html>
<head>
	<title>RetroRecords About Us</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	 <link rel="stylesheet" type="text/css" href="media.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php';?>
	<h2>FAQ</h2>
		<button type="button" class="collapsible">Who are we?</button>
		<div class="content">
		  <p>RetroRecords Newtown is a one-stop-shop for your retro music purchases.<br>We source retro albums, rare LPs and used records for you, the music consumer and audiophile.</p>
		</div>
		<button type="button" class="collapsible">Why Vinyl?</button>
		<div class="content">
		  <p>Vinyl records sound better<br>It's pure nostalgia. The audio on vinyl records cannot be compressed as much as modern digital audio.<br>It means that the audio from vinyl records is more precise and more natural..</p>
		</div>
		<script>
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
		  coll[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var content = this.nextElementSibling;
		    if (content.style.maxHeight){
		      content.style.maxHeight = null;
		    } else {
		      content.style.maxHeight = content.scrollHeight + "px";
		    } 
		  });
		}
		</script>
</body>
</html>