<?php
session_start();
?>
<html>

<head>
	<?php
	include "./sources/sources.html";
	?>
</head>

<header>
<!-- HEADER -->
<?php
include "./elements/element_header.php";
?>
<!--  -->
</header>

<body>
	<h2> Register for a new account </h2>
	<div id='Register'>
		<form method='post' action='_handle_registration.php'>
			<div><label for='email'> Email: </label><input id='email' class='EntryBox' type='text' name='email' placeholder='dank.boi@coolpeeps.edu'></div>
			<div><label for='username'> Username:</label><input id='username' class='EntryBox' type='text' id='username' name='username'></div>
			<div><label for='password1'> Password:</label><input id='password1' class='EntryBox' type='password' name='password1'></div>
			<div><label for='password2'> Confirm password: </label><input id='password2' class='EntryBox' type='password' name='password2'></div>
			<div><input type='submit' value='Register'></div>
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

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>