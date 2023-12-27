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
?>