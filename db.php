<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "scholarship";

$conn = mysqli_connect($host,$user,$password,$dbname);

if(!$conn){
    die("Database Connection Failed");
}

?>