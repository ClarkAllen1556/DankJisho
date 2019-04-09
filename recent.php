<?php
session_start()
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
	<h2><a class="NamedLink" href=recent.php>Recent Searches</a></h2>
	<div class="Row">
		<div class="Column" id="Recent_Col">
			<img class="TextImage" src="icons/recent_search_icon.png"> <a class="Link" href="recent.php"> Recent </a>
			<?php
			if(!isset($_SESSION["logged_in"])) {
				$_SESSION["message"] = "Sorry, please login to view your recent search list";
				header("Location: login.php"); // Redirect if user is not logged in
			}

			include "./_handle_recent.php";

			$recents = getRecentSearches();

			echo "<table id='listings'>";
			echo "<td><h4> Word </h4></td>" . "<td><h4> Date Searched </h4></td>";
			foreach ($recents as $entry) {
				echo "<tr><td>" . htmlspecialchars($entry['Query'])
				. "</td><td> {$entry['SearchTime']} </td></tr>";
			}
			echo "</table>";
			?>
		</div>
	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>