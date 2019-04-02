<?php
require_once './data/Dao.php';
// require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/../Dao.php');

function getForumListings() {
	$dao = new Dao();
	// echo ">>>>> getForumListings {$dao}";

	$conn = $dao->getConnection();
	$query = "select
		Title,
		Users.Username as Author,
		SubmissionTime as Posted
	from ForumPosts
	left join
		Users on ForumPosts.UserID = Users.ID
	order by SubmissionTime desc;";

	// print_r($query);
	// $filler = $conn->query($query); //, SubmissionTime  from Comments order by SubmissionTime desc", PDO::FETCH_ASSOC);  }
	// print_r($filler->fetchAll());
	return $conn->query($query, PDO::FETCH_ASSOC); //, SubmissionTime  from Comments order by SubmissionTime desc", PDO::FETCH_ASSOC);  }
}

function addForumPost() {
	session_start();

	$dao = new Dao();
	$conn = $dao->getConnection();
	$forumPost = $_POST['userForumPost'];

}
?>