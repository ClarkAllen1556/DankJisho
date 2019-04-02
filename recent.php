<?php
session_start()
?>

<html>

<head>
	<title>Recent Search - DankJisho</title>
	<link rel="stylesheet" href="styles/title_section.css">
	<link rel="stylesheet" href="styles/search_section.css">
	<link rel="stylesheet" href="styles/content_section.css">
	<link rel="stylesheet" href="styles/global.css">
	<link rel="stylesheet" href="styles/footer_section.css">
	<link rel='icon' type='image/x-icon' href='favicon.ico' />
</head>
<header>
	<div id="Title">
		<span class="UpTitleIcons"> <img src="icons/logo_cute.png"> </span>
		<h1><span class="UpTitle"> <a class="NamedLink" href="index.php">Dank Forum </a> </span></h1>
	</div>
	<div id="Search">
		<form method='get' action="search.php">
			<input class="SearchBox" type="text" name="search" placeholder="New search..."> <!-- TODO This image is not resizing-->
			<button type="submit" class=""> <i class="SearchButton"> Search...<!-- <img class="TextImage" src="icons/searchbox_icon.png"> </i> --> </button>
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
	<h2><a class="NamedLink" href=recent.php>Recent Searches</a></h2>
	<div class="Row">
		<div class="Column" id="Recent_Col">
			<img class="TextImage" src="icons/recent_search_icon.png"> <a class="Link" href="recent.php"> Recent </a>
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