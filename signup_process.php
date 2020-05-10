<?php

include_once("function/helper.php");
include_once("function/connection.php");

// Register the database to class
$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];

// Hide the password on address bar
unset($_POST['password']);

// Created all of $_POST an one url link
$dataForm = http_build_query($_POST);

// Checking the "user" Database table
$query = mysqli_query($connection, "SELECT * FROM user WHERE username = '$username'");
$queryy = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email'");

// Checking the sign up fields
if (empty($name) || empty($email) || empty($username) || empty($password) || empty($phone_number)) {
    header("location:" . BASE_URL . "index.php?page=index&notif=require&$dataForm");
} elseif (mysqli_num_rows($query) == 1) { // If the value is 1, the username is already exist
    header("location:" . BASE_URL . "index.php?page=index&notif=username&$dataForm");
} elseif (mysqli_num_rows($queryy) == 1) { // If the value is 1, the email is already exist
    header("location:" . BASE_URL . "index.php?page=index&notif=email&$dataForm");
} else {

    // Hide the password on Database
    $password = md5($password);

    // Taking on information from class into "user table database"
    mysqli_query($connection, "INSERT INTO user(name, email, username, password, phone_number) VALUES('$name', '$email', '$username', '$password', '$phone_number')");
}
