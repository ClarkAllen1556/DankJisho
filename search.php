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
	<?php
	require_once "_handle_search.php";

	if(isset($_GET['recent_search'])) {
		$_SESSION['searchString'] = $_GET['recent_search'];
	}

	parseJishoJson();
	?>
	<h2><?php echo "Results for: \"" . $_SESSION['searchString']. "\""; ?></a></h2>
	<div class="Row">
		<div class="Column" id="Forum_Col">
		<!-- <span><a href="test.php"> testing link</a></span> -->
		<!-- <img class="TextImage" src="icons/forum_icon.png"> <a class="Link" href="forum.php"> Forums </a> -->
		<?php
		require_once "_handle_search.php";
		printParsedJishoJson();
		unset($_SESSION['searchString']);
		unset($_SESSION['formattedString']);
		?>
		</div>
	</div>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>