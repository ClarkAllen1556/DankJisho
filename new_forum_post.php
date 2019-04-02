<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
	<title>Forums - DankJisho</title>
	<link rel='stylesheet' href='styles/title_section.css'>
	<link rel='stylesheet' href='styles/search_section.css'>
	<link rel='stylesheet' href='styles/content_section.css'>
	<link rel='stylesheet' href='styles/global.css'>
	<link rel='stylesheet' href='styles/footer_section.css'>
	<link rel='icon' type='image/x-icon' href='favicon.ico' />
</head>
<header>
	<div id='Title'>
		<span class='UpTitleIcons'> <img src='icons/logo_cute.png'> </span>
		<h1><span class='UpTitle'> <a class='NamedLink' href='forum.php'>Dank Forum </a> </span></h1>
	</div>
	<div id='Search'>
		<form method='get' action='search.php'>
			<input class='Search' class='Box' type='text' name='search' placeholder='New search...'> <!-- TODO This image is not resizing-->
			<button type='submit' class=''> <i class='SearchButton'> Search...<!-- <img class='TextImage' src='icons/searchbox_icon.png'> </i> --> </button>
		</form>
		<?php
		if(isset($_SESSION["logged_in"]))
			echo "<span> <a class='Link' href='userpage.php'>" . $_SESSION['username'] . "</a> <a class='Link' href='_handle_logout.php'>Logout...</a></span>";
		else
			echo "<span> <a class='Link' href='login.php'>Login</a> <a class='Link' href='register.php'>Register</a></span>";
		?>
	</div>
</header>
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
<div id="Footer">
	<span>
		<a class="Link" href="about.php"> About |</a>
	</span>
	<span>
		<a class="Link" href="forum.php"> Forum |</a>
	</span>
	<span>
		<a class="Link" href="index.php"> Home |</a>
	</span>
	<span>
		<a class="Link" href="recent.php"> Recent </a>
	</span>
</div>
</html>