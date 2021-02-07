<?php
session_start();
include('connection.php');

$username = isset($_SESSION['user']);
$product_id = $_REQUEST['id'];

if(!empty($username)){

       $sql = "INSERT INTO `cart_items` (`product_id`, `quantity`, `username`, `date_placed`) VALUES ( $product_id, '1', '$username', CURRENT_TIMESTAMP)";
       
           if ($mysqli->query($sql) === TRUE) {
               echo "<span class='alert alert-success'> Item Added To Cart</span>";
               header('Location:../home.php');
            }
            else{
                echo"Failed";
            }
}
else{
    echo"
    <script>
        alert('Log In First To Add Item to Cart!'); 
            setTimeout(function () {
                window.location = '../index.php';
            }, 1000);
    </script>
    ";
}
