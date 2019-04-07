<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("./data/Dao.php");

function addToRecent($searched) {
	$dao = new Dao();
	$conn = $dao->getConnection();

	// $query = "select ID from Users where UserName = '" . $_SESSION["username"] . "';";
	// $result = $conn->query($query, PDO::FETCH_ASSOC);
	// $userID = $result->fetchObject();


	$query = "insert into RecentSearches(UserID, Query) values ('" . $_SESSION["userID"] . "','" . $searched . "');";
	$result = $conn->query($query, PDO::FETCH_ASSOC);
}

function getRecentSearches() {
	$dao = new Dao();
	$conn = $dao->getConnection();

	// $query = "select ID from Users where UserName = '" . $_SESSION["username"] . "';";
	// $result = $conn->query($query, PDO::FETCH_ASSOC);
	// $userID = $result->fetchObject();
	$query = "select * from RecentSearches where UserID = '" . $_SESSION["userID"] . "' order by SearchTime desc;";
	return $conn->query($query, PDO::FETCH_ASSOC);
}
?>