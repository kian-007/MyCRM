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





//require_once ('D:\xampp\htdocs\Mycrm\config.php');
//global $pdo;
//$dsn = "pgsql:host=".PSQL_HOST.";port=5432;dbname=".PSQL_DATABASE.";";
//$pdo = new PDO($dsn, PSQL_USERNAME, PSQL_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);




//global $db;
//$db = new mysqli(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);
//$db->set_charset("utf8");





//$db = new SQLite3(DB_FILENAME);
/*
function create_db_tables(){
    global $db;
    
    $db->query("
        CREATE TABLE IF NOT EXISTS options(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            option_name TEXT NOT NULL,
            option_value TEXT NOT NULL
        );
    ");
    
    $db->query("
        CREATE TABLE IF NOT EXISTS users(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT NOT NULL,
            password TEXT NOT NULL,
            first_name TEXT NOT NULL,
            last_name TEXT NOT NULL,
            phone_number TEXT NOT NULL,
            email TEXT NOT NULL
        );
    ");
}
*/
