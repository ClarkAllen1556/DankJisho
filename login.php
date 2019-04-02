<?php
session_start();
?>
<html>

<head>
	<title>Login - DankJisho</title>
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
		<span class="UpTitleIcons"> <img src="icons/logo_cute.png"> </span>
		<h1><span class="UpTitle"> <a class="NamedLink" href="index.php">Dank Jisho </a> </span></h1>
	</div>
	<div id="Search">
		<form method='get' action="search.php">
			<input class='Search' class='Box' type="text" placeholder="New search..."> <!-- TODO This image is not resizing-->
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
	<h2> Log into an existing account </h2>
	<div id="Register">
		<?php
		if(isset($_SESSION['logged_in'])) {
			echo "<div> You are already logged in. Thank you. </div>";
		} else {
			echo "
			<form method='post' action='./_handle_login.php'>
				<div><label for='email'> Email: </label><input id='email' class='EntryBox' type='text' name='email' ></div>
				<div><label for='password'>Password: </label><input id='password' class='EntryBox' type='password' name='password'></div>";

				if(isset($_SESSION['message'])) {
					echo "<div id='message'>" . $_SESSION['message'] . "</div>";
				}
				unset($_SESSION['message']);

			echo "<div><input type='submit' value='Login'></div>
			</form>";
		}
		?>
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