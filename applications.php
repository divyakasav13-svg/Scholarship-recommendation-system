<?php
session_start();
include "../config/db.php";

/* -------- ADMIN LOGIN CHECK -------- */
if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit;
}

/* -------- FETCH APPLICATION DATA -------- */
$sql = "SELECT 
applications.id,
students.name AS student_name,
students.email,
scholarships.name AS scholarship_name,
applications.status,
applications.apply_date

FROM applications

JOIN students 
ON applications.student_id = students.id

JOIN scholarships 
ON applications.scholarship_id = scholarships.id

ORDER BY applications.id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Applications</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>

/* 🌈 Background */
body{
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    color: white;
}

/* 🧾 Title */
.title{
    font-size: 30px;
    font-weight: bold;
}

/* 💎 Table Container */
.table-box{
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

/* 📊 Table */
.table{
    color: white;
}

.table thead{
    background: rgba(0,0,0,0.4);
}

.table tbody tr:hover{
    background: rgba(255,255,255,0.1);
    transition: 0.3s;
}

/* 🎯 Buttons */
.btn-custom{
    border-radius: 25px;
    font-weight: 600;
}

.btn-sm{
    margin: 2px;
}

/* ⚡ Action highlight */
.action-btn:hover{
    transform: scale(1.08);
}

/* 📱 Responsive */
@media(max-width:768px){
    .title{
        font-size: 22px;
    }
}

</style>

</head>

<body>

<div class="container py-5">

<h2 class="mb-4 text-center title animate__animated animate__fadeInDown">
📄 Manage Scholarship Applications
</h2>

<div class="table-box animate__animated animate__fadeInUp">

<div class="table-responsive">
<table class="table table-bordered text-center align-middle">

<thead>
<tr>
<th>ID</th>
<th>Student</th>
<th>Email</th>
<th>Scholarship</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['student_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['scholarship_name']; ?></td>

<td>
<?php 
if($row['status'] == 'Approved'){
    echo "<span class='badge bg-success'>Approved</span>";
}elseif($row['status'] == 'Rejected'){
    echo "<span class='badge bg-danger'>Rejected</span>";
}else{
    echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
?>
</td>

<td><?php echo $row['apply_date']; ?></td>

<td>

<?php if($row['status'] == 'Pending'){ ?>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Approved" 
class="btn btn-success btn-sm btn-custom action-btn">
✔ Approve
</a>

<a href="update_status.php?id=<?php echo $row['id']; ?>&status=Rejected" 
class="btn btn-danger btn-sm btn-custom action-btn">
✖ Reject
</a>

<?php } else { ?>

<span class="text-light">✔ Completed</span>

<?php } ?>

</td>

</tr>

<?php } ?>

</tbody>

</table>
</div>

</div>

<div class="text-center mt-4">
<a href="dashboard.php" class="btn btn-dark btn-custom">
⬅ Back to Dashboard
</a>
</div>

</div>

</body>
</html>