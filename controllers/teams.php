<?php
include("../orm/Team.php");
$data = explode('/',$_SERVER['PATH_INFO']);

if($data[1])	{
	$team = Team::getById($data[1]);
	echo json_encode($team->toArray());
}
else	{
	$teams = Team::fetchAll();
	$array = array();
	foreach($teams as $team)	{
		$array[] = $team->toArray();
	}
	echo json_encode($array);
}

?>