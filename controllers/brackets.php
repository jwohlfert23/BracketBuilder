<?php
include("../orm/Bracket.php");
include("../orm/User.php");
session_start();
$data = explode('/',$_SERVER['PATH_INFO']);

$id = $data[1];

	//If Data Type is Post
	if($_POST['teams'])	{
		//Update Instance
		if($id)		{
			$b = Bracket::getById($id);
			if($b->getUserId() == $_SESSION['user_id'])	{
				$rounds = array();
				$array = json_decode($_POST['teams']);
				foreach($array as $team)	{
					$rounds[] = $team->rnd;
				}
				$list = implode(',',$rounds);
				
				$b->setRounds($list);
				$b->setScore($_POST['score']);
				echo json_encode($b->toArray());
			}
			else	{
				header("HTTP/1.0 400 Bad Request");
				echo 'This is not your bracket. You cannot update or save it';
			}
		}
		//Save new bracket
		else	{
			$array = json_decode($_POST['teams']);
			$rounds = array();
			foreach($array as $team)	{
				$rounds[] = $team->rnd;
			}
			$b = Bracket::save($_SESSION['user_id'],$rounds,$_POST['name']);
			echo json_encode($b->toArray());
		}
	}
	else if($id && $data['2']=='delete')	{
		$b = Bracket::getById($id);
		if($b->getUserId() == $_SESSION['user_id'])	{
			echo $b->delete();
		}
		else	{
			header("HTTP/1.0 400 Bad Request");
			echo 'This is not your bracket. You cannot delete it';
		}
		
	}
	//If ID is provided, get instance of saved bracket
	else if($id)	{
		$b = Bracket::getById($id);
		$user = User::getById($b->getUserId());
		$array = $b->toArray();
		$array['user_name'] = $user->getName();
		echo json_encode($array);
	}
	//Get All User Brackets
	else {
		$brackets = array();
		foreach(Bracket::getUserBrackets($_SESSION['user_id']) as $b)	{
			$brackets[] = $b->toArray();
		}
		echo json_encode($brackets);
	}
?>