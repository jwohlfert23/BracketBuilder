<?php
require_once('Database.php');
class Team
{
	private $id;
	private $name;
	private $seed;
	private $round;
	private $region;
	private $wins;
	private $losses;
	private $conference;
	private $rpi;

	public static function getById($id) {
		$mysqli = Database::connect();
		$id = $mysqli->real_escape_string($id);
		$result = $mysqli->query("SELECT * FROM teams WHERE id = " . $id);
		if ($result) {
			if ($result->num_rows == 0){
				return null;
			}
			$row = $result->fetch_array();
			return new Team($row['id'], $row['name'], $row['seed'], $row['round_id'], $row['region_id'], $row['wins'], $row['losses'], $row['conference'],$row['rpi']);
		}
		return null;
	}
	
	public static function fetchAll() {
		$mysqli = Database::connect();
		$result = $mysqli->query("SELECT id FROM teams");
		$teams = array();
		if ($result) {
			while($row = $result->fetch_array()) {
					$teams[] = Team::getById($row['id']);
			}
		}
		return $teams;
	}

	private function __construct($id, $name, $seed, $round, $region, $wins, $losses, $conference, $rpi) {
		$this->id = $id;
		$this->name = $name;
		$this->round = $round;
		$this->region = $region;
		$this->wins = $wins;
		$this->losses = $losses;
		$this->seed = $seed;
		$this->conference = $conference;
		$this->rpi = $rpi;
	}

	public function getId() {
		return $this->id;
	}
	public function getName()	{
		return $this->name;
	}
	public function getSeed()	{
		return $this->seed;
	}
	public function getRound()	{
		return $this->round;
	}
	public function getRegion() {
		return $this->region;
	}
	public function getWins()	{
		return $this->wins;
	}
	public function getLosses()	{
		return $this->losses;
	}
	public function getRpi()	{
		return $this->rpi;
	}
	public function getConference()	{
		return $this->conference;
	}
	public function toArray()		{
		return array(
		'id' => $this->getId(),
		'seed' => $this->getSeed(),
		'name' => $this->getName(),
		'wins' => $this->getWins(),
		'losses' => $this->getLosses(),
		'round_id' => $this->getRound(),
		'region_id' => $this->getRegion(),
		'rpi' => $this->getRpi(),
		'conference' => $this->getConference()
	);
	}
}
