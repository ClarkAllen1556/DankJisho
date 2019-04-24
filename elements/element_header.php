<!--
	Hold layout of the header that will appear across the site.
 -->
<div id="Title">
	<!-- <span class="UpTitleIcons"> <img src="icons/logo_cute.png" alt="Logo"> </span> -->
	<h1><span class="UpTitle"><a class="NamedLink" href="index.php"> <img id='Logo' src="icons/logo_cute.png" alt="Logo"> Dank Jisho </a> </span></h1>
</div>
<div id="Search">
	<form method='get' action="search.php">
		<input class='Search Box' type="text" name="search" placeholder="New search..."> <!-- TODO This image is not resizing-->
		<button type="submit" class=""> <i class="SearchButton"> Search...<!-- <img class="TextImage" src="icons/searchbox_icon.png">--> </i></button>
	</form>
	<span>
	<?php
	if(isset($_SESSION["logged_in"]))
		echo "<a class='Link' href='_handle_logout.php' title='Logout'><img class='TextImage' src='icons/logout_icon.png'></a>"
		. "<a class='Link' href='userpage.php' title='" . htmlspecialchars($_SESSION['username'])
		. "&#39;s Account Page'> <img class='TextImage' src='icons/account_icon.png'> </a>";
	else
		echo "<a class='Link' href='login.php' title='Login to existing account'><img class='TextImage' src='icons/login_icon.png'></a>
		<a class='Link' href='register.php' title='Register new account'><img class='TextImage' src='icons/register_icon.png'></a>";
	?>
	<a class='Link' href='index.php' title='DankJisho Home'> <img class='TextImage' src='icons/home_icon.png'></a></span>
</div>
