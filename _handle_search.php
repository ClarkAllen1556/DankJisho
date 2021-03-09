<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

echo "get: ";
var_dump($_GET);
echo "post: ";
var_dump($_POST);

if(isset($_SESSION["recent_search"]))
	return fetchRecent($_SESSION["recent_search"]);
elseif(!isset($_GET["recent"]) || trim($_GET["search"]) == "") {
	// header("Location: index.php");
	exit;
} elseif(isset($_GET["search"]))
	$userSearch = $_GET["search"];

$resultJSON = file_get_contents("http://beta.jisho.org/api/v1/search/words?keyword=" . urlencode($userSearch));
$resultObj = json_decode($resultJSON);

$_SESSION['searchString'] = $userSearch;
$_SESSION['searched'] = true;

var_dump($_SESSION);

function parseJishoJson () {
	global $userSearch, $resultJSON, $resultObj;

	$formattedString = "";
	if (count($resultObj->data)) {
		$formattedString .= print_r( "<table>", true);
		// Cycle through the JSON object
		$i = 0;
		foreach ($resultObj->data as $datas => $entry) {
			// Output a row
			$formattedString .= print_r( "<tr>", true);
			$formattedString .= print_r( "<td>$entry->slug<br/>", true);

			foreach ($entry->japanese as $readings => $reading) {
				if(isset($reading->reading))
					$formattedString .= print_r( "&nbsp&nbsp" . "($reading->reading)", true);
			}
			$formattedString .= print_r( "<br/>", true);
			foreach ($entry->senses as $translations => $meaning) {
				$i = 1;
				foreach ($meaning->english_definitions as $defs => $english) {
					$formattedString .= print_r( "&nbsp&nbsp" . "$i. $english ", true);
					$i++;
				}
			}
			"</td>";
			$formattedString .= print_r( "</tr>", true);
		}

		// Close the table
		$formattedString .= print_r( "</table>", true);
	}

	$_SESSION["formattedString"] = $formattedString;

	if(isset($_SESSION["logged_in"])) {
		require_once "./_handle_recent.php";

		addToRecent($userSearch);
	}
}

function fetchRecent() {
	$recent = parseJishoJson();
	var_dump($recent);

	return $recent;
}

function printParsedJishoJson() {
	echo $_SESSION["formattedString"];
}

/*
probbly easier to just rename all links
and then incoperate this code into the div block somehow
*/

// header("Location: search.php"); // TODO
?>