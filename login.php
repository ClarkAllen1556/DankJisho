<?php
session_start();
?>
<html>

<!-- HEADER -->
<?php
include "./elements/element_header.php";
?>
<!--  -->

<body>
	<h2> Log into an existing account </h2>
	<div id="Register">
		<?php
		if(isset($_SESSION['logged_in'])) {
			header("Location: userpage.php"); // TODO
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

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>