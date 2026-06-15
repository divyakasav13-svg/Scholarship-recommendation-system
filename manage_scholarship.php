<?php
session_start();
include "../config/db.php";

/* -------- ADMIN LOGIN CHECK -------- */
if(!isset($_SESSION['admin_id'])){
    header("Location: login.php");
    exit;
}

/* -------- DELETE SCHOLARSHIP -------- */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM scholarships WHERE id='$id'");
    header("Location: manage_scholarship.php");
}

/* -------- FETCH SCHOLARSHIPS -------- */
$result = mysqli_query($conn,"SELECT * FROM scholarships ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Scholarships</title>

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
📋 Manage Scholarships
</h2>

<div class="text-center mb-4">
<a href="add_scholarship.php" class="btn btn-primary btn-custom">
➕ Add New Scholarship
</a>
</div>

<div class="table-box animate__animated animate__fadeInUp">

<div class="table-responsive">
<table class="table table-bordered text-center align-middle">

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Course</th>
<th>Category</th>
<th>Min %</th>
<th>Income</th>
<th>Deadline</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['course']; ?></td>

<td><?php echo $row['category']; ?></td>

<td><?php echo $row['min_percentage']; ?></td>

<td>₹<?php echo $row['income_limit']; ?></td>

<td><?php echo $row['deadline']; ?></td>

<td>

<a href="edit_scholarship.php?id=<?php echo $row['id']; ?>" 
class="btn btn-info btn-sm btn-custom">
✏ Edit
</a>

<a href="manage_scholarship.php?delete=<?php echo $row['id']; ?>" 
class="btn btn-danger btn-sm btn-custom"
onclick="return confirm('Are you sure to delete this scholarship?')">
🗑 Delete
</a>

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