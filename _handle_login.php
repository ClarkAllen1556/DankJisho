<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "./data/Dao.php";

$dao = new Dao();
$conn = $dao->getConnection();
$userEmail = $_POST["email"];
$pass = $_POST["password"]; // only to be used in the query

// if they enter null for user and pass
if($userEmail == NULL || $pass == NULL) {
	$_SESSION['message'] = "Error, the password or password was incorrect.";
	header("Location: login.php");
	exit();
}

$query = "select * from Users where Email = '$userEmail'";// and Password = '$pass';" ;

$result = ($conn->query($query, PDO::FETCH_ASSOC))->fetchObject();

if (!password_verify($pass, $result->Password)) {
	$_SESSION['message'] = "Error, the password or password was incorrect.";
	header("Location: login.php");
	exit();
} else {
	$_SESSION["logged_in"] = true;
	$_SESSION["username"] = $result->UserName;
	$_SESSION["userID"] = $result->ID;

	header("Location: login.php"); // TODO
	// header('Location: ' . $_SERVER['HTTP_REFERER']); // TODO this does not work it seems
}
?>

