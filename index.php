<?php
include_once("index.php");
session_start();
?>

<html>

<!-- HEADER -->
<?php
include "./elements/element_header.php";
?>
<!--  -->

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
		window.location.href = './forum_comments.php'
	});

	$("#recents").on("click", "tr", function (e) {
		const recent = $(e.currentTarget).find("td:eq(0)").text();

		console.log(recent);
		sessionStorage.setItem('recent', recent);
	});
}
</script>

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