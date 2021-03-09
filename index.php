<?php
include_once("index.php");
session_start();
?>

<html>

<head>
	<?php
	include "./sources/sources.html";
	?>
	<script language='javascript'>
	function searchRecent () { // TODO need to fix this
		// $.ajax({
		// 	url: './search.php',
		// 	data: { post_id: ID },
		// 	type: 'get',
		// 	success: (resp) => {
		// 		$('#PostContents').text(resp);
		// 		console.log("server response: " + resp);
		// 	}
		// });
	}

	window.onload = () => {
		// get selected row
		$("#listings").on("click", "tr", function (e) {
			const postInfo = {
				title: $(e.currentTarget).find("td:eq(0)").text(),
				author: $(e.currentTarget).find("td:eq(1)").text(),
				id: $(e.currentTarget).find("td:eq(3)").text()
			}

			sessionStorage.setItem('postInfo', JSON.stringify(postInfo));
			window.location.href = './forum_comments.php';
		});

		$("#recents").on("click", "tr", function (e) {
			const recent = $(e.currentTarget).find("td:eq(0)").text();

			console.log("index recent: " + recent);
			sessionStorage.setItem('recent_search', recent);

			$.ajax({
				url: './_handle_search.php',
				data: { recent: recent },
				type: 'get',
				success: (resp) => {
					console.log("server response: " + resp);
					window.location.href = './search.php';
				},
				error: (e) => {
					console.error(e);
				}
			});
		});
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
	<div class='Row'>
		<span class='Column' id='Recent_Col'>
		<?php
		// ----- recent column -----
		include "./elements/element_recent.php";
		// -----

		// ----- forum column -----
		include "./elements/element_forum.php";
		// -----
		?>
	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>