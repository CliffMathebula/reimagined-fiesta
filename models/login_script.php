<?php
session_start();

include('connection.php');


$username = $_POST['username'];
$password = $_POST['password'];

//performs validation to check if all fields are Filled
if (!empty($username) && !empty($password)) {




    $sql = "SELECT * FROM `users_table`  WHERE username='$username' AND user_password='$password'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        
        $_SESSION['user'] = $username;
        
        echo "<span class='alert alert-success alert-block text-danger'>Success</span>";
        
        header('Location: ../home.php');
    } else {
        echo "<span class='alert alert-warning text-danger'><strong>User does not Exist!</strong></span>";
    }
}
