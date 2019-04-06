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

<body>
	<div class='Row'>
		<span class='Column' id='Recent_Col'>
			<span><a class='Link' href='recent.php'><h3><img class='TextImage' src='icons/recent_search_icon.png'> Recent </h3></a></span>
			<?php
			include "./_handle_recent.php";
			if(isset($_SESSION["logged_in"])) {
				$recents = getRecentSearches();

				echo "<table id='listings'>";
				echo "<td><h4> Word </h4></td>" . "<td><h4> Date Searched </h4></td>";
				foreach ($recents as $entry) {
					echo "<tr><td>" . htmlspecialchars($entry['Query'])
					. "</td><td> {$entry['SearchTime']} </td></tr>";
				}
				echo "</table>";
			} else {
				echo "No recent searches.";
			}
			?>
		</span>
		<span class='Column' id='Forum_Col'>
			<!-- <span><a href='test.php'> testing link</a></span> -->
			<span><a class="Link" href="forum.php"> <img class="TextImage" src="icons/forum_icon.png"> Forums </a></span>
			<?php
			include "./_handle_forum.php";

			$listings = getForumListings();

			echo "<table id='listings'>";
			echo "<td><h4> Title </h4></td>" . "<td><h4> Author </h4></td>" . "<td><h4> Posted </h4></td>";
			foreach ($listings as $post) {
				echo "<tr><td>"
				. "<a href=\"./forum_comments.php\">" . htmlspecialchars($post['Title'])
				. "<td>" . htmlspecialchars($post['Author'])
				. "</td><td> {$post['Posted']} </td></tr>";
			}
			echo "</table>";
			?>
		</span>
	</div>
</body>

<!-- FOOTER -->
<?php
include "./elements/element_footer.html";
?>
<!--  -->

</html>