<?php

function Connect()
{
	$dbhost = "localhost";
	$mysqluser = "root";
	$mypass = "";
	$dbname = "foodCourt";
	//create connection with all criditioal
	$con = new mysqli($dbhost, $mysqluser, $mypass, $dbname) or die($con->connect_error);

	return $con;
}
?>