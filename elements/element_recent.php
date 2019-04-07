<span><a class='Link' href='recent.php'><h3><img class='TextImage' src='icons/recent_search_icon.png'> Recent </h3></a></span>
	<?php
	include "./_handle_recent.php";
	if(isset($_SESSION["logged_in"])) {
		$recents = getRecentSearches();

		echo "<table id='recents'>";
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