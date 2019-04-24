<div class="Column" id="Forum_Col">
	<!-- <span><a href="test.php"> testing link</a></span> -->
	<div>
		<span><a class="Link" href="forum.php"> <img class="TextImage" src="icons/forum_icon.png"> Forums </a></span>
		<span style="float: right">
		<?php
		include "./_handle_forum.php";
		if (isset($_SESSION['logged_in'])) {
		?>
			<form method='post' action='./new_forum_post.php'>
				<button type='button id='NewPost' value='NewPost' name='newpost' href='./new_forum_post.php'> New Post </button>
			</form>
		<?php
		}
		?>
		</span>
	</div>
	<?php

	$listings = getForumListings();
	// print_r($listings);

	echo "<table id='listings'>";
	echo "<td><h4> Title </h4></td>" . "<td><h4> Author </h4></td>" . "<td><h4> Posted </h4></td>";
	foreach ($listings as $post) {
		echo "<tr><td>"
		. htmlspecialchars($post['Title']) . "</td>"
		. "<td>" . htmlspecialchars($post['Author']) . "</td>"
		. "<td> {$post['Posted']} </td>"
		. "<td style='display: none;'>" . $post['ID'] . "</td></tr>";
	}
	echo "</table>";
	?>
</div>