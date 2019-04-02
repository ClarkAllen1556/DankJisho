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
	<h2><a class="NamedLink" href=forum.php>Forums/Community</a></h2>
	<div class="Row">
		<div class="Column" id="Forum_Col">
			<!-- <span><a href="test.php"> testing link</a></span> -->
			<img class="TextImage" src="icons/forum_icon.png"> <a class="Link" href="forum.php"> Forums </a>
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
			?>
		</div>
		<div>
			<?php
			if (isset($_SESSION['logged_in'])) {
			?>
				<form method='post' action='./new_forum_post.php'>
					<button type='button id='NewPost' value='NewPost' name='newpost' href='./new_forum_post.php'> New Post </button>
				</form>
			<?php
			} /*else {
				echo "<input id='NewPost' type='submit' value='Login' href='login.php'>";
			}*/
			?>
		</div>
	</div>
</body>
<div id='Footer'>
	<span>
		<a class='Link' href='about.php'> About |</a>
	</span>
	<span>
		<a class='Link' href='forum.php'> Forum |</a>
	</span>
	<span>
		<a class='Link' href='index.php'> Home |</a>
	</span>
	<span>
		<a class='Link' href='recent.php'> Recent </a>
	</span>
</div>

</html>