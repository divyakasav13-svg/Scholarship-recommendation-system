<?php 
session_start();
include "../config/db.php";

/* SUCCESS MESSAGE */
$msg = "";

if(isset($_POST['add'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $course = $_POST['course'];
    $category = $_POST['category'];
    $percentage = (int)$_POST['percentage'];
    $income = (int)$_POST['income'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO scholarships
    (name, course, category, min_percentage, income_limit, gender)
    VALUES
    ('$name', '$course', '$category', '$percentage', '$income', '$gender')";

    if(mysqli_query($conn,$sql)){
        $msg = "Scholarship Added Successfully ✅";
    }else{
        $msg = "Error: ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Scholarship</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>

/* 🌈 Background */
body{
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
}

/* 🧾 Title */
.title{
    font-size: 32px;
    font-weight: bold;
    color: white;
}

/* 💎 Glass Form */
.form-box{
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 30px;
    color: white;
    box-shadow: 0 8px 30px rgba(0,0,0,0.3);
}

/* Inputs */
.form-control, .form-select{
    border-radius: 12px;
    padding: 10px;
}

/* 🎯 Button */
.btn-custom{
    border-radius: 30px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-custom:hover{
    transform: scale(1.05);
}

/* Alert */
.alert{
    border-radius: 12px;
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

<h2 class="text-center mb-4 title animate__animated animate__fadeInDown">
➕ Add Scholarship
</h2>

<?php if($msg){ ?>
<div class="alert alert-info text-center animate__animated animate__fadeIn">
<?php echo $msg; ?>
</div>
<?php } ?>

<form method="POST" class="form-box animate__animated animate__fadeInUp">

<!-- NAME -->
<div class="mb-3">
<label>Scholarship Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<!-- COURSE -->
<div class="mb-3">
<label>Course</label>
<select name="course" class="form-select" required>
<option value="">Select Course</option>
<option value="Science">Science</option>
<option value="Commerce">Commerce</option>
<option value="Arts">Arts</option>
<option value="Engineering">Engineering</option>
<option value="Medical">Medical</option>
<option value="All">All</option>
</select>
</div>

<!-- CATEGORY -->
<div class="mb-3">
<label>Category</label>
<select name="category" class="form-select" required>
<option value="">Select Category</option>
<option value="OPEN">OPEN</option>
<option value="OBC">OBC</option>
<option value="SC">SC</option>
<option value="ST">ST</option>
<option value="EBC">EBC</option>
<option value="VJNT">VJNT</option>
<option value="All">All</option>
</select>
</div>

<!-- GENDER -->
<div class="mb-3">
<label>Gender</label>
<select name="gender" class="form-select">
<option value="All">All</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>

<!-- PERCENTAGE -->
<div class="mb-3">
<label>Minimum Percentage</label>
<input type="number" name="percentage" class="form-control" required>
</div>

<!-- INCOME -->
<div class="mb-3">
<label>Income Limit</label>
<input type="number" name="income" class="form-control" required>
</div>

<!-- BUTTON -->
<button name="add" class="btn btn-primary w-100 btn-custom">
Add Scholarship
</button>

</form>

<div class="text-center mt-4">
<a href="dashboard.php" class="btn btn-dark btn-custom">
⬅ Back to Dashboard
</a>
</div>

</div>

</body>
</html>