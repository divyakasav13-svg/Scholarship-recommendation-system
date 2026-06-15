<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Scholarship Recommendation System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<style>

/* 🔥 Background Gradient */
body{
    background: linear-gradient(135deg, #4facfe, #00f2fe);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

/* 🔥 Glass Card */
.main-card{
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 50px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    color: #fff;
}

/* 🔥 Title */
.title{
    font-size: 42px;
    font-weight: bold;
}

/* 🔥 Subtitle */
.subtitle{
    font-size: 18px;
    opacity: 0.9;
}

/* 🔥 Buttons */
.btn-custom{
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-custom:hover{
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* 🔥 Mobile Responsive */
@media(max-width:768px){
    .main-card{
        padding: 30px;
    }
    .title{
        font-size: 28px;
    }
}

</style>

</head>

<body>

<div class="container">

<div class="main-card text-center animate__animated animate__fadeInUp">

<h1 class="title animate__animated animate__fadeInDown">
🎓 Scholarship Recommendation System
</h1>

<p class="subtitle mt-3 animate__animated animate__fadeInUp">
Find the best scholarships based on your profile
</p>

<div class="mt-4">

<a href="login.php" class="btn btn-primary btn-custom me-2">
Student Login
</a>

<a href="register.php" class="btn btn-success btn-custom me-2">
Register
</a>

<a href="admin/login.php" class="btn btn-dark btn-custom">
Admin Panel
</a>

</div>

</div>

</div>

</body>
</html>