<?php 
session_start();
include "config/db.php";

if(isset($_POST['login'])){

$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = md5($_POST['password']);

$sql = "SELECT * FROM students
WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

$row = mysqli_fetch_assoc($result);

$_SESSION['student_id'] = $row['id'];

header("Location: student/dashboard.php");
exit;

}else{
$error = "Invalid Email or Password!";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Login</title>

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
    width: 100%;
    max-width: 400px;
    margin: auto;
}

/* 🧾 Title */
.title{
    font-size: 28px;
    font-weight: bold;
}

/* ✨ Inputs */
.form-control{
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
        font-size: 22px;
    }
}

</style>

</head>

<body>

<div class="container">

<div class="card-glass animate__animated animate__fadeInUp">

<h2 class="text-center mb-4 title animate__animated animate__fadeInDown">
🔐 Student Login
</h2>

<?php if(isset($error)){ ?>
<div class="alert alert-danger text-center">
<?php echo $error; ?>
</div>
<?php } ?>

<form method="POST">

<input type="email"
name="email"
class="form-control mb-3"
placeholder="Email" required>

<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password" required>

<button name="login"
class="btn btn-primary btn-custom w-100">
Login
</button>

</form>

<div class="text-center mt-3">
<a href="register.php" class="text-white">
Don't have an account? Register
</a>
</div>

</div>

</div>

</body>
</html>