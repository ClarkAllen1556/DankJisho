<?php
session_start();

require_once("./data/Dao.php");

$email = $_POST["email"];
$username = $_POST["username"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];

$valid = true;
$messages = array();

if(empty($email)) {
	$messages[] = "Please enter an email";
	$valid = false;
}

if (empty($username)) {
	$messages[] = "Please enter a username";
	$valid = false;
}

if ($password1 != $password2) {
	$messages[] = "Passwords dont match";
	$valid = false;
}

$password1 = password_hash($password1, PASSWORD_DEFAULT);

$dao = new Dao();
$conn = $dao->getConnection();

// $query = "select * from Users where Email = '" . $email . "';";
// $result = $conn->query($query, PDO::FETCH_ASSOC);

// if($result > 0) {
// 	$messages[] = "This email address is already associated with an account";
// 	$valid = false;

// 	$result = 0;
// }

// $query = "select * from Users where UserName = '" . $username . "';";
// $result = $conn->query($query, PDO::FETCH_ASSOC);

// if($result > 0) {
// 	$messages[] = "That username is " . $result->fetchObject() . $result. "already taken";
// 	$valid = false;

// 	$result = 0;
// }

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$messages[] = "Please enter a valid email address";
	$valid = false;
}

if(!$valid) {
	$_SESSION["messages"] = $messages;
	$_SESSION["form_input"] = $_POST;
	header("Location: register.php");
	exit();
}

$query = "insert into Users(Email, UserName, Password) values ('" . $email . "','" . $username . "','". $password1 ."');";
$result = $conn->query($query, PDO::FETCH_ASSOC);

header("Location: login.php");
exit;
?>