<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "mysqli_crud");

if(!$conn){
    die('Connection failed.' . mysqli_connect_error());
}


?>