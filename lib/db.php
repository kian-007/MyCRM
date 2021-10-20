<?php

global $pdo;

function connect_to_db(){
	global $pdo;
	$db = parse_url(getenv("DATABASE_URL"));
	
	$pdo = new PDO("pgsql:" . sprintf(
		"host=%s;port=%s;user=%s;password=%s;dbname=%s",
		$db["host"],
		$db["port"],
		$db["user"],
		$db["pass"],
		ltrim($db["path"], "/")
	));
	return $pdo;
}
