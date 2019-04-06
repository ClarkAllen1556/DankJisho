<?php
session_start();
?>

<html>

<!-- HEADER -->
<?php
include "./elements/element_header.php";
?>
<!--  -->

<body>
	<h2><a class="NamedLink" href=forum.php>Forums/Community</a></h2>
	<div class="Row">
		<div class="Column" id="Forum_Col">
			<!-- <span><a href="test.php"> testing link</a></span> -->
			<span><a class="Link" href="forum.php"> <img class="TextImage" src="icons/forum_icon.png"> Forums </a></span>
			<?php
			include "./_handle_forum.php";

			$listings = getForumListings();

			echo "<table id='listings'>";
			echo "<td><h4> Title </h4></td>" . "<td><h4> Author </h4></td>" . "<td><h4> Posted </h4></td>";
			foreach ($listings as $post) {
				echo "<tr><td>"
				. "<a href=\"./forum_comments.php\">" . htmlspecialchars($post['Title'])
				. "<td>" . htmlspecialchars($post['Author'])
				. "</td><td> {$post['Posted']} </td></tr>";
			}
			echo "</table>";

			if (isset($_SESSION['logged_in'])) {
			?>
				<form method='post' action='./new_forum_post.php'>
					<button type='button id='NewPost' value='NewPost' name='newpost' href='./new_forum_post.php'> New Post </button>
				</form>
			<?php
			}
			?>
		</div>
	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>