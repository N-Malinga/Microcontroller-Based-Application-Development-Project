<?php
include 'connection.php';

// Check if the ID is provided
//if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Delete the row from the database
    $sql = "DELETE FROM d_dose_table WHERE d_name = '$id'";
    if ($connection->query($sql) === TRUE) {
        header('location:index.php');
    } else {
        echo '<script> alert("Error deleting record") </script>';
    }
//} else {
//    echo '<script> alert("Invalid request") </script>';
//}

// Close connection
$connection->close();
?>
