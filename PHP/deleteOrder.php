<?php
session_start();
require 'mysqlconnection.php';
$con = Connect();
if (empty($_POST)) {
    $id = $_GET['id'];
    $query = "delete from ORDERS  where order_ID='$id'";
    $success = $con->query($query);
    header('Location: view_order_expired.php');
} else {
    echo 'Error Genreted try agaon?';
}