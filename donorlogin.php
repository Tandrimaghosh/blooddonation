<?php
$conn=mysqli_connect("localhost","root","","winky");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Login Page</title>
    <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/020/967/309/original/red-blood-icon-free-png.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <?php
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['pass'];
if($email!="" && $password!=""){
$response=mysqli_query($conn,"SELECT * FROM register WHERE email='$email'");
if(mysqli_num_rows($response)>0){
$result=mysqli_query($conn,"SELECT * FROM register WHERE password='$password'");
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_array($response);
    $_SESSION['bloodgroup']=$row['bgroup'];
    $_SESSION['oldid']=$row['id'];
    header("location:view.php");
}
else{
    echo"
    <div class='alert alert-danger text-center mt-5' role='alert'>
    Wrong Password!!Please enter correct password
    </div>
    ";
}
}
else{
    echo"
    <div class='alert alert-danger text-center mt-5' role='alert'>
    Not Registered Yet! Please Register First
    </div>
    ";
}
}
else{
    echo "
    <div class='alert alert-danger text-center mt-5' role='alert'>
    Please Fill All The Field
    </div>
    ";
}
}
    ?>
    <!-- form -->
    <div class="container" id="container">
    <div class="form-container log-in-container">
    <form method="post">
    <h1>Login</h1>
<div class="social-container">
<a href="#" class="social"><i class="fa fa-facebook fa-2x"></i></a>
<a href="#" class="social"><i class="fab fa fa-twitter fa-2x"></i></a>
</div>
<span>or use your account</span>
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="email">
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="pass">
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
  <a href="index.php">Back to Home</a>
  <p>New Donor? <a href="donorregistration.php">click here</a></p>
</form>
    </div>
    <div class="overlay-container">
<div class="overlay">
<div class="overlay-panel overlay-right">
<img src="https://t3.ftcdn.net/jpg/02/76/71/88/360_F_276718846_1mDkxI8gb6FrfuwAiPb6OuB4M7BbeuoV.jpg">
</div>
</div>
</div>
</div>
    <!-- form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>