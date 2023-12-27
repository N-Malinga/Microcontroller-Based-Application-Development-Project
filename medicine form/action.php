<?php
$server_name = "localhost";
$user_name = "root";
$password = "Nijin.9202";
$database = "project";

$connection = new mysqli($server_name , $user_name ,$password, $database);

/*if($connection -> connect_error){
   die("Connection error");
}
else{
   echo 'Connection ok';
}*/

    $d_name = mysqli_real_escape_string($connection, $_POST['d_name']);
    $d_qty = floatval($_POST['d_dose']);

    $time = $_POST['d_time'];
    
    
    $insert = "INSERT INTO d_dose_table (d_name, d_dose) VALUES('$d_name','$d_qty')";
    mysqli_query($connection, $insert);
    

    foreach($time as $item)
    {
        $query = "INSERT INTO d_time_table (d_name, d_time) VALUES('$d_name','$item')";
        if (!mysqli_query($connection, $query)) {
            echo 'Error: ' . mysqli_error($connection); // Debugging error
        }
        mysqli_query($connection,$query);
    }
    header('location:index.php');

?>
