<?php
session_start();
include "../config/db.php";

/* -------- LOGIN CHECK -------- */
if(!isset($_SESSION['student_id'])){
    header("Location: ../login.php");
    exit;
}

$student_id = $_SESSION['student_id'];

/* -------- FETCH APPLICATIONS -------- */
$sql = "SELECT 
applications.id,
scholarships.name AS scholarship_name,
applications.status,
applications.apply_date

FROM applications

JOIN scholarships 
ON applications.scholarship_id = scholarships.id

WHERE applications.student_id = '$student_id'

ORDER BY applications.id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Application Status</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>

/* 🌈 Background */
body{
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

/* 🧾 Title */
.title{
    font-size: 30px;
    font-weight: bold;
    color: #fff;
}

/* 💎 Card */
.status-card{
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 20px;
    color: #fff;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    transition: 0.3s;
}

.status-card:hover{
    transform: translateY(-6px);
}

/* 📦 Grid */
.grid{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px,1fr));
    gap: 20px;
}

/* 🎯 Button */
.btn-custom{
    border-radius: 30px;
    font-weight: 600;
}

/* 📱 Responsive */
@media(max-width:768px){
    .title{
        font-size: 24px;
    }
}

</style>

</head>

<body>

<div class="container py-5">

<h2 class="text-center mb-5 title animate__animated animate__fadeInDown">
📄 My Application Status
</h2>

<div class="grid">

<?php if(mysqli_num_rows($result) > 0){ ?>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<div class="status-card animate__animated animate__fadeInUp">

<h5>#<?php echo $row['id']; ?> - <?php echo $row['scholarship_name']; ?></h5>

<p><strong>Applied On:</strong> <?php echo $row['apply_date']; ?></p>

<p><strong>Status:</strong>
<?php 
if($row['status'] == 'Approved'){
    echo "<span class='badge bg-success'>Approved</span>";
}elseif($row['status'] == 'Rejected'){
    echo "<span class='badge bg-danger'>Rejected</span>";
}else{
    echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
?>
</p>

</div>

<?php } ?>

<?php } else { ?>

<div class="text-center text-white">
<h5>No Applications Found</h5>
<p>Apply for scholarships to see status here</p>
</div>

<?php } ?>

</div>

<div class="text-center mt-5">
<a href="dashboard.php" class="btn btn-dark btn-custom">
⬅ Back to Dashboard
</a>
</div>

</div>

</body>
</html>