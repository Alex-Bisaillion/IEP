<?php

$mysql_hostname = "WITHHELD";
$mysql_username = "WITHHELD";
$mysql_password = "WITHHELD";
$mysql_database = "WITHHELD";
$dsn = "mysql:host=".$mysql_hostname.";dbname=".$mysql_database;

$debug = false;
try
{
	$pdo= new PDO($dsn, $mysql_username,$mysql_password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
	echo 'PDO error: could not connect to DB, error: '.$e;
}
