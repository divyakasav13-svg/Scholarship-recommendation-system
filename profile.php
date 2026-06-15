<?php
session_start();
include "../config/db.php";

/* -------- LOGIN CHECK -------- */
if(!isset($_SESSION['student_id'])){
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['student_id'];

/* -------- FETCH STUDENT DATA -------- */
$result = mysqli_query($conn,"SELECT * FROM students WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

/* -------- UPDATE PROFILE -------- */
if(isset($_POST['update'])){

$course = $_POST['course'];
$category = $_POST['category'];
$income = $_POST['income'];
$percentage = $_POST['percentage'];
$gender = $_POST['gender'];

mysqli_query($conn,"
UPDATE students SET
course='$course',
category='$category',
income='$income',
percentage='$percentage',
gender='$gender'
WHERE id='$id'
");

$success = "Profile Updated Successfully!";

/* REFRESH DATA */
$result = mysqli_query($conn,"SELECT * FROM students WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Profile</title>

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
.profile-card{
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
.form-control{
    border-radius: 10px;
    border: none;
    padding: 10px;
}

/* 🚀 Buttons */
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
    .profile-card{
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

<div class="profile-card animate__animated animate__fadeInUp">

<h2 class="text-center mb-4 title animate__animated animate__fadeInDown">
👤 Update Profile
</h2>

<?php if(isset($success)){ ?>
<div class="alert alert-success text-center">
<?php echo $success; ?>
</div>
<?php } ?>

<form method="POST">

<div class="mb-3">
<label>Full Name</label>
<input type="text" class="form-control"
value="<?php echo $data['name']; ?>" disabled>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" class="form-control"
value="<?php echo $data['email']; ?>" disabled>
</div>

<div class="mb-3">
<label>Course</label>
<input type="text" name="course" class="form-control"
value="<?php echo $data['course']; ?>" required>
</div>

<div class="mb-3">
<label>Category</label>
<select name="category" class="form-control" required>
<option value="">Select</option>
<option <?php if($data['category']=="General") echo "selected"; ?>>General</option>
<option <?php if($data['category']=="OBC") echo "selected"; ?>>OBC</option>
<option <?php if($data['category']=="SC") echo "selected"; ?>>SC</option>
<option <?php if($data['category']=="ST") echo "selected"; ?>>ST</option>
</select>
</div>

<div class="mb-3">
<label>Family Income</label>
<input type="number" name="income" class="form-control"
value="<?php echo $data['income']; ?>" required>
</div>

<div class="mb-3">
<label>Percentage</label>
<input type="number" step="0.01" name="percentage" class="form-control"
value="<?php echo $data['percentage']; ?>" required>
</div>

<div class="mb-3">
<label>Gender</label>
<select name="gender" class="form-control" required>
<option value="">Select</option>
<option <?php if($data['gender']=="Male") echo "selected"; ?>>Male</option>
<option <?php if($data['gender']=="Female") echo "selected"; ?>>Female</option>
</select>
</div>

<div class="d-flex gap-2">

<button name="update" class="btn btn-primary btn-custom w-100">
Update Profile
</button>

<a href="dashboard.php" class="btn btn-secondary btn-custom w-100">
Back
</a>

</div>

</form>

</div>

</div>

</body>
</html>