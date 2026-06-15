<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['student_id'])){
header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>

/* 🌈 Background */
body{
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

/* 💎 Glass Card */
.dashboard-card{
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 40px;
    color: #fff;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

/* 🧾 Title */
.title{
    font-size: 32px;
    font-weight: bold;
}

/* 🎯 Buttons */
.btn-custom{
    border-radius: 30px;
    padding: 12px;
    font-weight: 600;
    transition: 0.3s;
    width: 100%;
}

.btn-custom:hover{
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

/* 📦 Grid */
.grid{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px,1fr));
    gap: 20px;
}

/* 📱 Responsive */
@media(max-width:768px){
    .dashboard-card{
        padding: 25px;
    }
    .title{
        font-size: 24px;
    }
}

</style>

</head>

<body>

<div class="container py-5">

<div class="dashboard-card animate__animated animate__fadeInUp">

<h2 class="text-center mb-4 title animate__animated animate__fadeInDown">
🎓 Student Dashboard
</h2>

<div class="grid">

<a href="profile.php" class="btn btn-light btn-custom">
👤 Update Profile
</a>

<a href="recommendation.php" class="btn btn-success btn-custom">
🎯 View Scholarships
</a>

<a href="status.php" class="btn btn-warning btn-custom">
📄 Application Status
</a>

<a href="../logout.php" class="btn btn-danger btn-custom">
🚪 Logout
</a>

</div>

</div>

</div>

</body>
</html>