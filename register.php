<?php 
session_start();
include "config/db.php";

if(isset($_POST['register'])){

$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = md5($_POST['password']);

$course = $_POST['course'];
$category = $_POST['category'];
$income = $_POST['income'];
$percentage = $_POST['percentage'];
$gender = $_POST['gender'];

/* -------- FILE UPLOAD -------- */
$document = $_FILES['document']['name'];
$tmp_name = $_FILES['document']['tmp_name'];

$upload_path = "uploads/".$document;

/* CREATE FOLDER IF NOT EXISTS */
if(!is_dir("uploads")){
    mkdir("uploads");
}

/* MOVE FILE */
move_uploaded_file($tmp_name,$upload_path);

/* -------- INSERT DATA -------- */
$sql = "INSERT INTO students
(name,email,password,course,category,income,percentage,gender,document)
VALUES
('$name','$email','$password','$course','$category','$income','$percentage','$gender','$document')";

if(mysqli_query($conn,$sql)){
    header("Location: login.php");
}else{
    echo "Error: " . mysqli_error($conn);
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>

/* 🌈 Background */
body{
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

/* 💎 Glass Card */
.card-glass{
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 40px;
    color: #fff;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

/* 🧾 Title */
.title{
    font-size: 30px;
    font-weight: bold;
}

/* ✨ Inputs */
.form-control, .form-select{
    border-radius: 10px;
    border: none;
    padding: 10px;
}

/* 🚀 Button */
.btn-custom{
    border-radius: 30px;
    padding: 12px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-custom:hover{
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* 📱 Responsive */
@media(max-width:768px){
    .card-glass{
        padding: 25px;
    }
    .title{
        font-size: 24px;
    }
}

</style>

</head>

<body>

<div class="container">

<div class="card-glass animate__animated animate__fadeInUp">

<h2 class="text-center mb-4 title animate__animated animate__fadeInDown">
📝 Student Registration
</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="name"
class="form-control mb-3"
placeholder="Full Name" required>

<input type="email" name="email"
class="form-control mb-3"
placeholder="Email" required>

<input type="password" name="password"
class="form-control mb-3"
placeholder="Password" required>

<input type="text" name="course"
class="form-control mb-3"
placeholder="Course (e.g. BCA, Science)" required>

<select name="category" class="form-control mb-3" required>
<option value="">Select Category</option>
<option>General</option>
<option>OBC</option>
<option>SC</option>
<option>ST</option>
</select>

<input type="number" name="income"
class="form-control mb-3"
placeholder="Family Income" required>

<input type="number" step="0.01" name="percentage"
class="form-control mb-3"
placeholder="Percentage" required>

<select name="gender" class="form-control mb-3" required>
<option value="">Select Gender</option>
<option>Male</option>
<option>Female</option>
</select>

<label class="mb-1">Upload Document</label>
<input type="file" name="document"
class="form-control mb-3" required>

<button name="register"
class="btn btn-primary btn-custom w-100">
Register
</button>

</form>

<div class="text-center mt-3">
<a href="login.php" class="text-white">Already have account? Login</a>
</div>

</div>

</div>

</body>
</html>