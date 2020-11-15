<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <title>Retro Records Newtown</title>
    <link rel="icon" type="image/svg+xml" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="reset.css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="styles.css" media="all">
    <link rel="stylesheet" type="text/css" href="media.css" media="all">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

  </head>
  <body>
    <?php include 'header.php';?>

	<h1 class="welcome">Welcome To RetroRecords Newtown<br><br></h1>
    <p class="featured-text">Featured</p>
    <!-- W3 Schools Gallary -->
    <div class="w3-content w3-display-container">
    <div class="w3-display-container mySlides">
      <img src="images/kg1.jpg" class="slider-img" alt="Eyes like the sky">
      <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
        King Gizz - Eyes Like The Sky $30
      </div>
    </div>

    <div class="w3-display-container mySlides">
      <img src="images/kg2.jpg" class="slider-img" alt="Polygonal">
      <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
        King Gizz - Polygonal Wonderland $25
      </div>
    </div>

    <div class="w3-display-container mySlides">
      <img src="images/kg3.jpg" class="slider-img" alt="Willoughby">
      <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
        King Gizz - Willoughby's Beach $40
      </div>
    </div>
    <!-- back and forth buttons -->
    <button class="w3-button w3-display-left w3-black slides" onclick="plusDivs(-1)">&#10094;</button>
    <button class="w3-button w3-display-right w3-black slides" onclick="plusDivs(1)">&#10095;</button>

    </div>

    <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
    </script>
    <!-- End -->


    <p class="details"><br>We are located at the top of King Street, just near the Marly Hotel.<br>Phone us on 02 9519 1234.</p>

    <p class="footer-licence">© Retro Records Newtown Pty Limited 20xx. All Rights Reserved - info@retrorecordsnewtown.com.au - <a href="legal.html">Legals</a></p>


  </body>
</html>