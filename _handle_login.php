<?php
session_start();
// Pretend i'm looking this up in a database
require "./data/Dao.php";
// require_once "Klogger.php";
// $logger = new KLogger ( "log.txt" , KLogger::EMERGENCY );
// $logger->emergency("dank");

$dao = new Dao();
$conn = $dao->getConnection();
$userEmail = $_POST["email"];
$pass = $_POST["password"]; // only to be used in the query
$query = "select * from Users where Email = '$userEmail' and Password = '$pass';" ;

$password_in_the_database = "abc123";
$result = ($conn->query($query, PDO::FETCH_ASSOC))->fetchObject();

// if (!isset($_POST["email"])) {
// 	$_SESSION['message'] = "Please enter the email associated with your account";
// 	header("Location: login.php");
// 	exit();
// }

if ($result->Password != $_POST["password"]) {
	$_SESSION['message'] = "Error, the password or password was incorrect.";
	header("Location: login.php");
	exit();
} else {
	$_SESSION['logged_in'] = true;
	$_SESSION['username'] = $result->UserName;

	header("Location: forum.php"); // TODO
	// header('Location: ' . $_SERVER['HTTP_REFERER']); // TODO this does not work it seems
}
?>

