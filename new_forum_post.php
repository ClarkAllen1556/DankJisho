<!DOCTYPE html>
<?php
session_start();
?>

<html>

<head>
	<?php
	include "./sources/sources.html";
	?>
	<script language="javascript">
	window.onload = function () {
		console.log("hello world");
	}

	$(document).ready(function() {
		var text_max = 1024;
		$('#textarea_feedback').html(text_max + ' characters remaining');

		$('#userForumPost').keyup(function() {
			var text_length = $('#userForumPost').val().length;
			var text_remaining = text_max - text_length;

			$('#textarea_feedback').html(text_remaining + ' characters remaining');
		});


		$('#submit').submit(function(e) {
			console.log("dankboi")
			e.preventDefault();

			// information to be sent to the server
			var info = $('#userForumPost').val();
			// alert(info);
			console.log(info)


			$.ajax({
				type: "POST",
				url: './handler/_post_forum.php',
				data: {foo: info}
			});
		});
	});
</script>
</head>

<header>
<!-- HEADER -->
<?php
include "./elements/element_header.php";
?>
<!--  -->
</header>

<body>
	<h2><a class='NamedLink' href=forum.php>Forums/Community</a></h2>
	<div class='Row'>
		<div class='Column' id='Forum_Col'>
		<img class='TextImage' src='icons/forum_icon.png'> <a class='Link' href='forum.php'> Forums </a>
			<form id='NewPost' method='post'>
				<?php
				include "./_handle_forum.php";
				?>
				<input class='Box' id='PostTitle' type='text' name='postTitle' placeholder='Post title...'>
				<textarea id='userForumPost' class='Box'  name='userForumPost' placeholder='What is on your mind bros?'></textarea>
				<!-- <div id="textarea_feedback"></div> TODO -->
				<?php
				if (isset($_SESSION['logged_in'])) {
				?>
					<button type='submit' id='submit' value='Submit' name='submit'> Submit </button>
				<?php
				} else {
				?>
					<span> <a class='Link' href='login.php'>Login</a> <a class='Link' href='./register.php'>Register</a></span>
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