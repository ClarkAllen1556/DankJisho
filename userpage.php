<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<html>

<!-- HEADER -->
<?php
include "./elements/element_header.php";
?>
<!--  -->

<body>
	<h2>
		<?php
		if(isset($_SESSION["logged_in"]))
			echo "Welcome to your page, " . $_SESSION["username"] . "!";
		else
			header("Location: login.php"); // Redirect if user is not logged in
		?>
	</h2>
	<p>
		Page coming soon...
	</p>
	<p>
		<a class='Link' href='./index.php'> < Back to DankJisho </a>
	</p>
</body>

<!-- FOOTER -->
<?php
include_once "./elements/element_footer.html";
?>
<!--  -->

</html>