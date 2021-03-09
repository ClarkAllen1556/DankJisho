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

	function fetchPostContents (postInfo) {
		const ID = postInfo.id;

		$.ajax({
			url: './_handle_forum.php',
			data: { post_id: ID },
			type: 'get',
			success: (resp) => {
				$('#PostContents').text(resp);
				console.log("server response: " + resp);
			}
		});
	}

	window.onload = () => {
		const postInfo = JSON.parse(sessionStorage.getItem('postInfo'));
		setPageTitle(postInfo);
		fetchPostContents(postInfo);
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
	<h2><a class='NamedLink' id='PostTitle'>[NAME_OF_POST]</a></h2>
	<div class='Row'>
		<div class='Column' id='Forum_Col'>
			<!-- <span><a href='test.php'> testing link</a></span> -->
			<a class='Link' href='forum.php'> <img class='TextImage' src='icons/forum_icon.png'> &#8701 Back to Forums </a>
			<span><blockquote id='PostContents'> [POST_CONTENTS] </blockquote></span>
			<!-- <span><blockquote id='PostAuthor'> [POST_AUTHOR] </blockquote></span> -->
		</div>
		</div>
	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>