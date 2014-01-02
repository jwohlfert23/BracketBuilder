<?php

class Database
{
	public static function connect()	{
		return new MySQLi('host','username','password','database');
	}

}
