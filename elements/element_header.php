<!--
	Hold layout of the header that will appear across the site.
 -->
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
			echo " <span> <a class='Link' href='userpage.php'> " . htmlspecialchars($_SESSION['username']) . "</a> <a class='Link' href='_handle_logout.php'>Logout...</a></span>";
		else
			echo "<span> <a class='Link' href='login.php'>Login</a> <a class='Link' href='register.php'>Register</a></span>";
		?>
		<span><a class='Link' href='index.php'> <img class='TextImage' src='icons/home_icon.png'> Home </a> </span>
	</div>
</header>