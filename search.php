<?php
session_start();
?>

<html>

<head>
	<?php
	include "./sources/sources.html";
	?>

	<script language='javascript'>
	function setPageTitle (postInfo) {
		if(postInfo) {
			$('#PostTitle').text(postInfo.title);
			console.log(postInfo.title);
		}
	}

	function fetchSearch (recent) {
		console.log("the recent boy from search.php: " + recent)

		$.ajax({
			url: './_handle_search.php',
			data: { search: "recent" },
			type: 'get',
			success: (resp) => {
				console.log("server response: " + resp);
			},
			error: (e) => {
				console.error(e);
			}
		});
	}

	window.onload = () => {
		console.log(sessionStorage)
		const recent = sessionStorage.getItem('recent_search');
		console.log("recent: " + recent)
		// setPageTitle(recent);
		// fetchSearch(recent);
	}
	</script>
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
	var_dump("idk:" . $_GET);
	print_r($_SESSION);
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