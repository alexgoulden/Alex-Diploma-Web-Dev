<?php
include 'include.php';
doDB();



//check for required info from the query string
if (!isset($_GET['category_id'])) {
	header("Location: categorylist.php");
	exit;
}

//create safe values
$safe_category_id = mysqli_real_escape_string($mysqli, $_GET['category_id']);

//verify topic exists
$verify_category_sql = "SELECT category_id FROM forum_topics
					 WHERE category_id  = '".$safe_category_id."'";
$verify_category_res = mysqli_query($mysqli, $verify_category_sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($verify_category_res) < 1) {
	//this category doesn't exist
	$display_block = "<p><em>You have selected an invalid category.<br>
					  Please <a href=\"categorylist.php\">try again</a>.</em></p>";
} else {
	//get the topic title
	while ($category_info =  mysqli_fetch_array($verify_category_res)) {
		$category_id = stripslashes($category_info['category_id']);
	}
	
	//gather the topic info
	$get_topics_sql = "SELECT topic_id, topic_title,
					   DATE_FORMAT(topic_create_time, '%b %e %Y at %r')
					   AS fmt_topic_create_time, topic_owner FROM forum_topics WHERE category_id = '".$safe_category_id."'
					   ORDER BY topic_create_time DESC";
	$get_topics_res = mysqli_query($mysqli, $get_topics_sql) or die(mysqli_error($mysqli));

	//create the display string
	$display_block = <<<END_OF_TEXT
	<p>Showing topics</p>
	<table>
	<tr>
	<th>Topics</th>
	<th># of Posts</th>
	</tr>
END_OF_TEXT;

	while ($topic_info = mysqli_fetch_array($get_topics_res)) {
		$topic_id = $topic_info['topic_id'];
		$topic_title = stripslashes($topic_info['topic_title']);
		$topic_create_time = $topic_info['fmt_topic_create_time'];
		$topic_owner = stripslashes($topic_info['topic_owner']);

		//get number of posts
		$get_num_posts_sql = "SELECT COUNT(post_id) AS post_count FROM
							  forum_posts WHERE topic_id = '".$topic_id."'";
		$get_num_posts_res = mysqli_query($mysqli, $get_num_posts_sql) or die(mysqli_error($mysqli));
		while ($posts_info = mysqli_fetch_array($get_num_posts_res)) {
			$num_posts = $posts_info['post_count'];
		}

		//add to display
		$display_block .= <<<END_OF_TEXT
		<tr>
		<td><a href="showtopic.php?topic_id=$topic_id">
		<strong>$topic_title</strong></a><br>
		Created on $topic_create_time by $topic_owner</td>
		<td class="num_posts_col">$num_posts</td>
		</tr>
END_OF_TEXT;
	}
	
	//free resuts
	mysqli_free_result($get_topics_res);
	mysqli_free_result($verify_category_res);

	//close conn
	mysqli_close($mysqli);

	//close up table
	$display_block .= "</table>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Posts in Topic</title>
	<style type="text/css">
		table {
			border: 1px solid black;
			border-collapse: collapse;
		}
		th {
			border: 1px solid black;
			padding: 6px;
			font-weight: bold;
			background: #ccc;
		}
		td {
			border: 1px solid black;
			padding: 6px;
			vertical-align: top;
		}
		.num_posts_col { text-align: center; }
	</style>
</head>
<body>
	<h1>Posts in Topic</h1>
	<?php echo $display_block; ?>

		<a href="../seestore.php">Back to store<br><br></a>

		<a href="categorylist.php">Back to categories</a>

</body>
</html>