<?php
session_start();
?>
<html>

<head>
	<title>Register New Account - DankJisho</title>
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
			<input class='Search' class='Box' type='text' name='search' placeholder="New search..."> <!-- TODO This image is not resizing-->
			<button type="submit" class=""> <i class="SearchButton"> Search...<!-- <img class="TextImage" src="icons/searchbox_icon.png"> </i> --> </button>
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
	<h2> Register for a new account </h2>
	<div id="Register">
		<form method="post" action="_handle_registration.php">
			<div>Email: <input class="EntryBox" type="text" name="email" placeholder="dank.boi@coolpeeps.edu"></div>
			<div>Username: <input class="EntryBox" type="text" id="username" name="username"></div>
			<div>Password: <input class="EntryBox" type="password" name="password1"></div>
			<div>Confirm password: <input class="EntryBox" type="password" name="password2"></div>
			<div><input type="submit" value="Register"></div>
			<?php
			if (isset($_SESSION['messages'])) {
				foreach ($_SESSION['messages'] as $message) {
					echo "<div>{$message}</div>";
				}
			}
			session_unset(); // doesn't reset unless i do the whole thing TODO
			// unset($_SESSION['message']);
			// unset($_SESSION['form_input']);
			?>
		</form>
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