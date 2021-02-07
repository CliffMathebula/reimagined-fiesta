<?php
include('connection.php');

$name = $_POST['first_name'];
$surname = $_POST['surname'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$street_address = $_POST['street_address'];
$postal_code = $_POST['code'];

//performs validation to check if all fields are Filled
if (
    empty($name) || empty($surname) || empty($gender) || empty($username) || empty($email) || empty($password) || empty($mobile) ||
empty($street_address) || empty($postal_code)
) {
    //Display alert danger when one of inputs fields on form is not filled
    echo "<span class='alert alert-danger'> Please Fill All Required Fields To Proceed With Your Registration! </span>";
} else {
    // Insert records query
    $sql = "INSERT INTO users_table (first_name, surname, gender,  email, username,  user_password, mobile_number, street_address, postal_code)
VALUES ('$name', '$surname', '$gender',  '$email', '$username', '$password', '$mobile',  '$street_address', '$postal_code')";

    // Checks if query managed to insert records to database
    if ($mysqli->query($sql) === TRUE) {
        //Display success alert message if user met all the requirements and records inserted successfully 
        echo "<span class='alert alert-success'> User Registered successfully </span>";
    } else {
        echo
        "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
