<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userSearch = $_GET['search'];
$resultJSON = file_get_contents("http://beta.jisho.org/api/v1/search/words?keyword=$userSearch");
$resultObj = json_decode($resultJSON);

$_SESSION['searchString'] = $userSearch;
$_SESSION['searched'] = true;

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