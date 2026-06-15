<?php
session_start();
include "../config/db.php";

$student_id = $_SESSION['student_id'];
$scholarship_id = $_GET['id'];

$sql = "INSERT INTO applications(student_id,scholarship_id)
VALUES('$student_id','$scholarship_id')";

mysqli_query($conn,$sql);

echo "Application Submitted";
?>