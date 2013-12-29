<?php

class Database
{
	public static function connect()	{
		return new MySQLi('classroom.cs.unc.edu','wohlfert','comp426','wohlfertdb');
	}

}
