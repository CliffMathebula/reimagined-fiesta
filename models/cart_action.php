<?php

include('connection.php');

$action = $_REQUEST['action'];
$id = $_REQUEST['id'];


$sql = "DELETE FROM `cart_items` WHERE `cart_items`.`product_id`=$id";

if ($mysqli->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location:../home.php');
  } else {
    echo "Error deleting record: " . $mysqli->error;
  }
