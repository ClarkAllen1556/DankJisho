<!DOCTYPE html>
<?php
session_start();
?>

<html>

<head>
	<title>About - DankJisho</title>
	<link rel="stylesheet" href="styles/title_section.css">
	<link rel="stylesheet" href="styles/search_section.css">
	<link rel="stylesheet" href="styles/content_section.css">
	<link rel="stylesheet" href="styles/global.css">
	<link rel="stylesheet" href="styles/footer_section.css">
	<link rel="stylesheet" href="styles/register_section.css">
	<link rel='icon' type='image/x-icon' href='favicon.ico' />
</head>
<header>
	<div id="Title">
		<span class="UpTitleIcons"> <img src="icons/logo_cute.png" alt="Logo"> </span>
		<h1><span class="UpTitle"> <a class="NamedLink" href="index.php">Dank Jisho </a> </span></h1>
	</div>
	<div id="Search">
		<form method='get' action="search.php">
			<input class='Search Box' type="text" name="search" placeholder="New search..."> <!-- TODO This image is not resizing-->
			<button type="submit" class=""> <i class="SearchButton"> Search...<!-- <img class="TextImage" src="icons/searchbox_icon.png">--> </i></button>
		</form>
		<?php
		if(isset($_SESSION["logged_in"]))
			echo "<span> <a class='Link' href='userpage.php'>" . htmlspecialchars($_SESSION['username']) . "</a> <a class='Link' href='_handle_logout.php'>Logout...</a></span>";
		else
			echo "<span> <a class='Link' href='login.php'>Login</a> <a class='Link' href='register.php'>Register</a></span>";
		?>
		<span><a class='Link' href='index.php'> <img class='TextImage' src='icons/home_icon.png'> Home </a> </span>
	</div>
</header>

<body>
	<h2> About Dank Jisho </h2>
	<div class="Column">
		<p>
			This website is made by <span title="I really like curry">Allen Clark</span> of Boise State University. More content is on the way...
		</p>
		<p>
			Links to my things:
		</p>
		<p>
			<a href='https://github.com/ClarkAllen1556/DankJisho'>Dank Jisho: GitHub</a>
			<a href='https://github.com/ClarkAllen1556'>
				<img src="https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png" alt="GitHub" height="30" width="30" />
			</a>
			<a rel="me" href='https://toot.cafe/@The_A_C'>
				<img src="https://toot.cafe/packs/logo-fe5141d38a25f50068b4c69b77ca1ec8.svg" alt="Mastodon" height="30" width="30" />
			</a>
			<a href="https://dev.to/allen1556">
				<img src="https://d2fltix0v2e0sb.cloudfront.net/dev-badge.svg" alt="Allen's DEV Profile" height="30" width="30" />
			</a>
		</p>
	</div>
</body>
<div id="Footer">
	<span>
		<a class="Link" href="about.php"> About |</a>
	</span>
	<span>
		<a class="Link" href="forum.php"> Forums |</a>
	</span>
	<span>
		<a class="Link" href="index.php"> Home |</a>
	</span>
	<span>
		<a class="Link" href="recent.php"> Recent </a>
	</span>
</div>

</html>