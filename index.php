<?php
	require ('db.php');
	// If an error occurs we can look here for more info:
	$connection_error = mysqli_connect_errno();
	$connection_error_message = mysqli_connect_error();

	$query = "SELECT * FROM blog ORDER BY id DESC";

	$result = $db->query($query);
?>
<!DOCTYPE html>
<html>
	<meta charset="utf-8" />
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="blog.css" />
<body>
	<div id="navbar">
		<ul>
			<li>Home</li>
			<li>Archive</li>
			<li>New Post</li>
		</ul>
	</div>
	<div id="wrapper">
		<form method="post" action="insert.php">
            <input name="status" id="status" placeholder="Say something!" />
            <input type="submit" value="Post" />
        </form>
		<ul id="posts">
			<?php 
			if($result->num_rows > 0):
				while ($row = $result->fetch_assoc()):
			    	echo "<li><h3>";
			    		echo $row['title'];
			    		echo "</h3><h5>";
			    		echo $row['timestamp'];
			    		echo "</h5>";
			    		echo $row['content'];
			    	echo "</li>";
				endwhile;
			else:
				echo "<li>404, Posts not found</li>";
			endif;
			?>
		</ul>
	</div>
</body>
</html>