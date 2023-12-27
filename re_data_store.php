<?php

@include 'config.php';

// Retrieve form data
$username = $_POST['username'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$gender = $_POST['gender'];

// Perform basic validation (you can add more validation as per your requirements)
if ($password !== $confirm_password) {
    die("Error: Passwords do not match.");
}

// Prepare and execute SQL statement to insert the data into the database
$sql = "INSERT INTO users (username, dob, email, password, gender)
        VALUES ('$username', '$dob', '$email', '$password', '$gender')";

if ($conn->query($sql) === TRUE) {
    //echo "Registration successful!";
    header('location:login_form.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
