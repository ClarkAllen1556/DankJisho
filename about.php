<!DOCTYPE html>
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
	<h2> About Dank Jisho </h2>
	<div class='Column'>
		<p>
			This website is made by <span title='I really like curry'>Allen Clark</span> of Boise State University. More content is on the way...
		</p>
		<p>
			Links to my things:
		</p>
		<p>
			<a class='NamedLink' href='https://github.com/ClarkAllen1556/DankJisho' target='_blank'>
				<img src='https://cdn4.iconfinder.com/data/icons/iconsimple-logotypes/512/github-512.png' alt='GitHub' height='30' width='30' />
			</a>
			<a class='NamedLink' rel='me' href='https://toot.cafe/@The_A_C' target='_blank'>
				<img src='https://toot.cafe/packs/logo-fe5141d38a25f50068b4c69b77ca1ec8.svg' alt='Mastodon' height='30' width='30' />
			</a>
			<a class='NamedLink' href='https://dev.to/allen1556' target='_blank'>
				<img src='https://d2fltix0v2e0sb.cloudfront.net/dev-badge.svg' alt='Allen's DEV Profile' height='30' width='30' />
			</a>
		</p>
	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>