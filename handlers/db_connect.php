<?php
define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','rain');

$dbCon = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);//create a new conn if no connection exists

if ($dbCon->error)//check if there is any error when connecting to the database
{
	ErrorHandler::MsgBoxError("Database Error : ".$dbCon->error);
	exit();//exit the file execution i we did not get a successful connection to the database
}
