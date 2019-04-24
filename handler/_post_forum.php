<?php
require_once "../data/Dao.php";

print_r($_POST);

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$dao = new Dao();
$conn = $dao->getConnection();
$postTitle = $_POST["postTitle"];
$forumPost = $_POST["userForumPost"];

// get the user
$query = "select * from Users where UserName = '" . $_SESSION["username"] . "';"; // query to get the logged in user's data
$queryResult = $conn->query($query, PDO::FETCH_ASSOC);
$queryResult = $user = $queryResult->fetchObject();

// add post to db
// TODO i will need to santatize before this though
$query = "
	insert into ForumPosts(UserID, Title, Post)
	values ('" . $queryResult->ID . "','" . $postTitle . "','" . $forumPost ."')
";
$queryResult = $conn->query($query, PDO::FETCH_ASSOC);

// increment user post count
$query = "update Users set NumPosts = NumPosts + 1 where UserName = '" . $user->UserName . "'";
$queryResult = $conn->query($query, PDO::FETCH_ASSOC);

// session_unset(); // TODO fix the reposting problem
?>