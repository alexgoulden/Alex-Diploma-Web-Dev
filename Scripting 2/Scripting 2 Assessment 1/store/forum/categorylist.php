<?php
include 'include.php';
doDB();

//gather topics
$get_categories_sql = "SELECT category_id, category_title, category_description 
				   	   FROM forum_categories ORDER BY category_id ASC";
$get_categories_res = mysqli_query($mysqli, $get_categories_sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_categories_res) < 1) {
	//there are no topics, so say so
	$display_block = "<p><em>No categories exist.</em></p>";
} else {
	//create the display string
	$display_block = <<<END_OF_TEXT
	<table>
	<tr>
	<th>CATEGORY TITLE</th>
	<th># of TOPICS</th>
	</tr>
END_OF_TEXT;

	while ($category_info = mysqli_fetch_array($get_categories_res)){
		$category_id = $category_info['category_id'];
		$category_title = stripslashes($category_info['category_title']);
		$category_description = $category_info['category_description'];

		//get number of posts
		$get_num_topics_sql = "SELECT COUNT(topic_id) AS topic_count FROM
							  forum_topics WHERE category_id = '".$category_id."'";
		$get_num_topics_res = mysqli_query($mysqli, $get_num_topics_sql) or die(mysqli_error($mysqli));
		while ($posts_info = mysqli_fetch_array($get_num_topics_res)) {
			$num_topics = $posts_info['topic_count'];
		}

		//add to display
		$display_block .= <<<END_OF_TEXT
		<tr>
		<td><a href="showcategory.php?category_id=$category_id">
		<strong>$category_title</strong></a><br>
		$category_description</td>
		<td class="num_topics_col">$num_topics</td>
		</tr>
END_OF_TEXT;
	}
	
	//free resuts
	mysqli_free_result($get_categories_res);
	mysqli_free_result($get_num_topics_res);

	//close conn
	mysqli_close($mysqli);

	//close up table
	$display_block .= "</table>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Community Categories</title>
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
		}
		.num_topics_col { text-align: center; }
	</style>
</head>
<body>
	<h1>Our Categories</h1>
	<?php echo $display_block; ?>
	<p>Would you like to <a href="addtopic.html">add a topic</a>?</p>
	<a href="../seestore.php">Back to store</a>
</body>
</html>