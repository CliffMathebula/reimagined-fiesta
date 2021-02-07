<?php
session_start();
include('connection.php');

$id = $_REQUEST['id'];
$username = $_SESSION['user'];

$sql = "UPDATE `cart_items` SET `status` = 'complete' WHERE `cart_items`.`username` = '$username' AND `cart_items`.`status`=''";

if ($mysqli->query($sql) === TRUE) {
    echo "Record Inserted successfully";
    header('Location:../home.php');
  } else {
    echo "Failed: " . $mysqli->error;
  }
