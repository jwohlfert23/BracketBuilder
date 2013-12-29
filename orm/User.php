<?php
require_once('Database.php');
class User
{
	private $id;
	private $first;
	private $last;
	private $email;
	private $password;
	private $salt;

	public static function save($first, $last, $email, $password) {
		$mysqli = Database::connect();

		//Sanitize Input
		$first = $mysqli->real_escape_string($first);
		$last = $mysqli->real_escape_string($last);
		$email = $mysqli->real_escape_string($email);
		
		// Password Salt
		$salt = uniqid(mt_rand(), true);
		$encrypted_password = sha1($password.$salt);

		if(User::getByEmail($email) == null)	{
			$result = $mysqli->query("INSERT INTO users (first, last, email, salt, password) VALUES ('".$first."','".$last."','".$email."','".$salt."','".$encrypted_password."')");
			if ($result) {
				$id = $mysqli->insert_id;
				return User::getById($id);
			}
		}
		return null;

	}
	public static function getByEmail($email)	{
		$mysqli = Database::connect();
		//Sanitize Email
		$email = $mysqli->real_escape_string($email);

		$result = $mysqli->query("SELECT * FROM users WHERE email = '" . $email ."'");
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$row = $result->fetch_array();
			return new User($row['id'], $row['first'], $row['last'], $row['email'], $row['salt'], $row['password']);

		}
		return null;
	}
	public static function getById($id) {
		$mysqli = Database::connect();
		$id = $mysqli->real_escape_string($id);

		$result = $mysqli->query("SELECT * FROM users WHERE id = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$row = $result->fetch_array();
			return new User($row['id'], $row['first'], $row['last'], $row['email'], $row['salt'], $row['password']);
		}
		return null;
	}

	public static function fetchAll() {
		$mysqli = Database::connect();
		$result = $mysqli->query("SELECT id FROM users");
		$users = array();
		if ($result) {
			while($row = $result->fetch_array()) {
					$users[] = User::getById($row['id']);
			}
		}
		return $users;
	}

	private function __construct($id, $first, $last, $email, $salt, $password) {
		$this->id = $id;
		$this->first = $first;
		$this->last = $last;
		$this->email = $email;
		$this->password = $password;
		$this->salt = $salt;
	}

	public function getId() {
		return $this->id;
	}
	public function getName()	{
		return $this->first.' '. $this->last;
	}
	public function getEmail()	{
		return $this->email;
	}
	public function toArray()	{
		return array(
		'name' => $this->first.' '.$this->last,
		'first' => $this->first,
		'last' => $this->last,
		'email' => $this->email,
		'id' => $this->id
		);
	}
	public function checkPassword($password)	{
		$encrypted_password = sha1($password.$this->salt);
		if($encrypted_password == $this->password)
			return true;
		else
			return false;
	}

	private function update() {
		$mysqli = Database::connect();
		
		$this->first = $mysqli->real_escape_string($this->first);
		$this->last = $mysqli->real_escape_string($this->last);
		$this->email = $mysqli->real_escape_string($this->email);
		
		$result = $mysqli->query("UPDATE users SET first = " . $this->first . ", last = ".$this->last." email = ".$this->email." WHERE id = " . $this->id);
		return $result;
	}

}
