<?php

// below code include connection file.
require 'mysqlconnection.php';
$con = Connect();//call the caonection calasss
session_start(); // Starting Session
// Storing Session
$user_check = $_SESSION['login_user1'];
// SQL Query To Fetch Complete Information Of User
$query = "SELECT username FROM MANAGER WHERE username = '$user_check'";
$ses_sql = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
?>