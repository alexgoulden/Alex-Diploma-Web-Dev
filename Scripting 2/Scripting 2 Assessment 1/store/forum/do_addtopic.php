<?php
include 'include.php';
doDB();

//check for req fields
if ((!$_POST['topic_owner']) || (!$_POST['topic_title']) || (!$_POST['post_text'])) {
	header("Location:addtopic.html");
	exit;
}

//create safe values
$clean_category_id = mysqli_real_escape_string($mysqli, $_POST['category_menu']);
$clean_topic_owner = mysqli_real_escape_string($mysqli, $_POST['topic_owner']);
$clean_topic_title = mysqli_real_escape_string($mysqli, $_POST['topic_title']);
$clean_post_text = mysqli_real_escape_string($mysqli, $_POST['post_text']);

//create and issue first query
$add_topic_sql = "INSERT INTO forum_topics(topic_title, topic_create_time, topic_owner, category_id)
				  VALUES ('".$clean_topic_title ."', now(), '".$clean_topic_owner."', '".$clean_category_id."')";

$add_topic_res = mysqli_query($mysqli, $add_topic_sql) or die(mysqli_error($mysqli));

//get id of last query
$topic_id = mysqli_insert_id($mysqli);

//create and issue second query
$add_post_sql = "INSERT INTO forum_posts(topic_id, post_text, post_create_time, post_owner, category_id)
				 VALUES ('".$topic_id."', '".$clean_post_text."', now(), '".$clean_topic_owner."', '".$clean_category_id."')";

$add_post_res = mysqli_query($mysqli, $add_post_sql) or die (mysqli_error($mysqli));
//close connection
mysqli_close($mysqli);

//create nice message for user
$display_block = "<p>The <strong>".$_POST["topic_title"]."</strong> topic has beem created.</p>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Topic Added</title>
</head>
<body>
<h1>New Topic Added</h1>
<?php echo $display_block; ?>
<br>
<a href="../seestore.php">Back to store<br></a>

<a href="categorylist.php">Back to categories</a>

</body>
</html>