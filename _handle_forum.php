<?php
require_once './data/Dao.php';
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/../Dao.php');

if(isset($_GET["post_id"])) {
	getForumPostContents($_GET["post_id"]);
}

function getForumPostContents($postID) {
	$dao = new Dao();
	// echo ">>>>> getForumListings {$dao}";

	$conn = $dao->getConnection();
	$query = "select Post from ForumPosts where ID ='" . $postID . "';";

	$result = $conn->query($query, PDO::FETCH_ASSOC)->fetchObject();

	echo htmlspecialchars($result->Post);
}

function getForumListings() {
	$dao = new Dao();
	// echo ">>>>> getForumListings {$dao}";

	$conn = $dao->getConnection();
	$query = "select
		ForumPosts.ID,
		Title,
		Users.Username as Author,
		SubmissionTime as Posted
	from ForumPosts
	left join
		Users on ForumPosts.UserID = Users.ID
	order by SubmissionTime desc;";

	return $conn->query($query, PDO::FETCH_ASSOC); //, SubmissionTime  from Comments order by SubmissionTime desc", PDO::FETCH_ASSOC);  }
}

function addForumPost() {
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
}

if (isset($_POST["userForumPost"]) && !ctype_space($_POST["userForumPost"]) && $_POST["userForumPost"] != "") {
	addForumPost();
}
?>