<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "Nijin.9202";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute SQL statement to retrieve user data
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User is registered, redirect to a new page
    $_SESSION['user_name'] = $row['username'];
    header("Location: welcome.php");
} else {
    // User is not registered, display an alert message
    echo "<script>alert('Invalid username or password. Please try again.');</script>";
    // Redirect back to the login page
    echo "<script>window.location.href='login_form.php';</script>";
}

$conn->close();
?>
