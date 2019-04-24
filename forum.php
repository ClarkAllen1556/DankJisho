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

<script language='javascript'>
window.onload = () => {
	// get selected row
	$("#listings").on("click", "tr", function (e) { // TODO XXX if there are multiple tables on page it will cause conflicts

		const postInfo = {
			title: $(e.currentTarget).find("td:eq(0)").text(),
			author: $(e.currentTarget).find("td:eq(1)").text(),
			id: $(e.currentTarget).find("td:eq(3)").text()
		}

		sessionStorage.setItem('postInfo', JSON.stringify(postInfo));
		console.log(sessionStorage.getItem('postInfo'));

		window.location.href = './forum_comments.php'
	})
}
</script>

<body>
	<h2><a class="NamedLink" href=forum.php>Forums/Community</a></h2>
	<div class='Row'>

	<!-- Forum -->
	<?php
		include "./elements/element_forum.php";
	?>
	<!--  -->

	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>