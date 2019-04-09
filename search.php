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
	parseJishoJson();
	?>
	<h2><?php echo "Results for: \"" . $_SESSION['searchString'] . "\""; ?></a></h2>
	<div class="Row">
		<div class="Column" id="Forum_Col">
		<!-- <span><a href="test.php"> testing link</a></span> -->
		<!-- <img class="TextImage" src="icons/forum_icon.png"> <a class="Link" href="forum.php"> Forums </a> -->
		<?php
		require_once "_handle_search.php";
		printParsedJishoJson();
		?>
		</div>
	</div>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>