<?php
include "../config/db.php";

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE applications SET status='$status' WHERE id='$id'";

mysqli_query($conn, $sql);

header("Location: applications.php");
?>