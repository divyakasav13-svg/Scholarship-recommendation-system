<?php 
session_start();
include "../config/db.php";

if(!isset($_SESSION['student_id'])){
    header("Location: ../login.php");
    exit;
}

/* ✅ DIRECT ALL DATA FETCH (NO FILTER) */
$sql = "SELECT * FROM scholarships ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

/* DEBUG (optional) */
// echo mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Recommendations</title>

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
.sch-card{
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 20px;
    color: #fff;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    transition: 0.3s;
}

.sch-card:hover{
    transform: translateY(-8px);
}

/* 🎯 Button */
.btn-custom{
    border-radius: 30px;
    font-weight: 600;
}

/* 📦 Grid */
.grid{
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px,1fr));
    gap: 20px;
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
🎯 Recommended Scholarships
</h2>

<div class="grid">

<?php if(mysqli_num_rows($result) > 0){ ?>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<div class="sch-card animate__animated animate__fadeInUp">

<h4 class="mb-2"><?php echo $row['name']; ?></h4>

<p><strong>Category:</strong> <?php echo $row['category']; ?></p>
<p><strong>Min %:</strong> <?php echo $row['min_percentage']; ?></p>
<p><strong>Income:</strong> ₹<?php echo $row['income_limit']; ?></p>

<a href="apply.php?id=<?php echo $row['id']; ?>"
class="btn btn-primary btn-sm btn-custom w-100 mt-2">
Apply Now
</a>

</div>

<?php } ?>

<?php } else { ?>

<div class="text-center text-white">
<h5>No Scholarships Found 😢</h5>
<p>Try updating your profile</p>
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