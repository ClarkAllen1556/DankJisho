<?php
class Dao {
	// private $host = "localhost";
	// private $db = "DankJisho";
	// private $user = "root";
	// private $pass = "";
	private $host = "us-cdbr-iron-east-03.cleardb.net";
	private $db = "heroku_fa88da99bce845a";
	private $user = "bc87e0e90c4511";
	private $pass = "2cf8e6ec";

	//   protected $logger;

	public function __construct () {
	// $this->logger = new KLogger ( "log.txt" , KLogger::DEBUG );
	// $this->host = "localhost";
	}

	public function getConnection () {
	// $this->logger->LogDebug("Getting a connection.");
	try {
		$conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
	} catch (Exception $e) {
	//   $this->logger->LogError(__CLASS__ . "::" . __FUNCTION__ . " The database exploded " . print_r($e,1));
		echo ">>>>> Failed connection:";
		echo "--->{$this->host}<---";

		echo print_r($e,1); // commented b/c prints to much junk
		exit;
	}
	return $conn;
	}

	public function getForumListings () {
	$conn = $this->getConnection();
	// echo "got here";
	// $filler = $conn->query("select Title from ForumPosts;");
	// print_r($filler->fetch()['Title']);
	return $conn->query("select Title, SubmissionTime from ForumPosts order by SubmissionTime desc;", PDO::FETCH_ASSOC); //, SubmissionTime  from Comments order by SubmissionTime desc", PDO::FETCH_ASSOC);
	}

	public function getUser ($userName) {
	$conn = $this->getConnection();
	}

	public function saveComment ($comment) {
	// $this->logger->LogInfo("Saving a comment [{$comment}]");

	$conn = $this->getConnection();
	$saveQuery = "insert into comment (comment, user_id) values (:comment, 1)";

	$q = $conn->prepare($saveQuery);
	$q->bindParam(":comment", $comment);
	$q->execute();
  }
}
?>