<!DOCTYPE html>
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
	<h2><a class='NamedLink' href=forum.php>Forums/Community</a></h2>
	<div class='Row'>
		<div class='Column' id='Forum_Col'>
		<img class='TextImage' src='icons/forum_icon.png'> <a class='Link' href='forum.php'> Forums </a>
			<form id='NewPost' method='post' action='./forum_comments.php'>
				<?php
				include "./_handle_forum.php";
				?>
				<input class='Box' id='PostTitle' type='text' name='postTitle' placeholder='Post title...'>
				<textarea id='userForumPost' class='Box'  name='userForumPost' placeholder='What is on your mind bros?'></textarea>
				<?php
				if (isset($_SESSION['logged_in'])) {
				?>
					<button type='button id='NewPost' value='Submit' name='submit' href='./new_forum_post.php'> Submit </button>
				<?php
				} else {
				?>
					<span> <a class='Link' href='login.php'>Login</a> <a class='Link' href='register.php'>Register</a></span>
				<?php
				}
				?>
			</form>
		</div>
	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>