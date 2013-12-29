<?php
require_once('Database.php');
class Bracket
{
	private $name;
	private $rounds;
	private $score;
	private $user_id;
	private $id;

	public static function save($user_id, $rounds, $name) {
		$mysqli = Database::connect();
		$name = $mysqli->real_escape_string($name);
		$rounds = implode(',',$rounds);
		$result = $mysqli->query("INSERT INTO brackets (user_id,rounds,name) VALUES ('$user_id','$rounds','$name')");
		if ($result) 	{
			$id = $mysqli->insert_id;
			return new Bracket($id, $user_id, $rounds, $name);
		}
		return null;
	}
	public static function getById($id) {
		$mysqli = Database::connect();
		$id = $mysqli->real_escape_string($id);

		$result = $mysqli->query("SELECT * FROM brackets WHERE id = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$row = $result->fetch_array();
			return new Bracket($row['id'],
								   $row['user_id'],
								   explode(',',$row['rounds']),
								   $row['name'], $row['score']);
		}
		return null;
	}

	public static function getUserBrackets($user_id) {
		$mysqli = Database::connect();
		$user_id = $mysqli->real_escape_string($user_id);

		$result = $mysqli->query("SELECT id FROM brackets WHERE user_id=".$user_id);
		$brackets = array();
		if ($result) {
			while($row = $result->fetch_array()) {
					$brackets[] = Bracket::getById($row['id']);
			}
		}
		return $brackets;
	}

	private function __construct($id, $user_id, $rounds, $name, $score = 0) {
		$this->id = $id;
		$this->user_id = $user_id;
		$this->rounds = $rounds;
		$this->name = $name;
		$this->score = $score;
	}

	public function getId() {
		return $this->id;
	}
	public function getUserId()	{
		return $this->user_id;
	}
	public function getName()	{
		return $this->name;
	}
	public function getRounds()	{ 
		return $this->rounds;
	}
	public function setRounds($rounds) {		
		$this->rounds = $rounds;
		return $this->update();
	}
	public function setScore($score)	{
		$this->score = $score;
		return $this->update();
	}
	public function getScore()	{
		return $this->score;
	}
	public function toArray()	{
		return array(
			'name' => $this->name,
			'id' => $this->id,
			'rounds' => $this->getRounds(),
			'user_id' => $this->user_id,
			'score' => $this->score
		);
	}
	public function delete()	{
		$mysqli = Database::connect();
		$result = $mysqli->query("DELETE FROM brackets WHERE id = " . $this->id);
		return $result;
	}
	private function update() {
		$mysqli = Database::connect();
		$this->name = $mysqli->real_escape_string($this->name);
		$result = $mysqli->query("UPDATE brackets SET name = '" . $this->name . "', rounds = '" . $this->rounds . "', score = '".$this->score."' WHERE id = " . $this->id);
		return $result;
	}

}
