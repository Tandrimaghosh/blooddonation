<?php
$conn=mysqli_connect("localhost","root","","winky");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Page</title>
    <link rel="icon" href="https://media.istockphoto.com/id/1438179747/vector/blood-bag-vector-icon-donate-packet-realistic-illustration-world-donor-day-sign-medical.jpg?s=612x612&w=0&k=20&c=OW3dCW25rpzcBysZ7ztpeygd-tiljyjdFql3wee3qSw=">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
 
</head>
<body>
    <?php
if(isset($_POST['login'])){
$email=$_POST['email'];
$password=$_POST['pass'];
if($email!="" && $password!=""){
$response=mysqli_query($conn,"SELECT * FROM userregister WHERE email='$email'");
if(mysqli_num_rows($response)>0){
$result=mysqli_query($conn,"SELECT * FROM userregister WHERE password='$password'");
if(mysqli_num_rows($result)>0){
    $_SESSION['email']=$email;
    header("location:index.php?$_SESSION[email]");
}
else{
    echo"
    <div class='alert alert-danger text-center' role='alert' style='color:blue;'>
    Wrong Password!!
    </div>
    ";
}
}
else{
    echo"
    <div class='alert alert-danger text-center' role='alert' style='color:blue;'>
    Not Registered Yet! Please Register First
    </div>
    ";
}
}
else{
    echo"
    <div class='alert alert-danger text-center' role='alert' style='color:blue;'>
    Please Fill All The Field
    </div>
    ";
}
}
    ?>
    <!-- form -->
<div class="bg-img">
<div class="content">
<header>Login Form</header>
    <form method="post">
  <div class="field">
  <span class="fa fa-user"></span>
    <input type="email" class="form-control" name="email" placeholder="Enter Your Email address">
  </div>
  <div class="field space">
  <span class="fa fa-lock"></span>
    <input type="password" class="form-control" name="pass" placeholder="Enter Your Password">
  </div>
  <div class="field mt-3">
  <input type="submit" name="login" value="LOGIN">
  </div>
  <a href="index.php">Back to home</a>
  
</form>
<div class="login">
               Or login with
            </div>
            <div class="links">
               <div class="facebook">
                  <i class="fab fa-facebook-f"><span>Facebook</span></i>
               </div>
               <div class="instagram">
                  <i class="fab fa-instagram"><span>Instagram</span></i>
               </div>
            </div>
            <div class="signup">
               Don't have account?
               <a href="userregistration.php">Signup Now</a>
            </div>
         </div>
      </div>
    <!-- form -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>