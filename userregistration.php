<?php
$conn=mysqli_connect("localhost","root","","winky");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="icon" href="https://media.istockphoto.com/id/1438179747/vector/blood-bag-vector-icon-donate-packet-realistic-illustration-world-donor-day-sign-medical.jpg?s=612x612&w=0&k=20&c=OW3dCW25rpzcBysZ7ztpeygd-tiljyjdFql3wee3qSw=">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style4.css">
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['pass'];
            $cpassword=$_POST['cpass'];
            $country=$_POST['country'];
            $address=$_POST['address'];
if($name!="" && $email!="" && $password!="" && $cpassword!="" && $address!=""){
    $state=$_POST['state'];
    $city=$_POST['city'];
            $response=mysqli_query($conn,"INSERT INTO userregister(name,email,password,country,state,city,address) VALUES('$name','$email','$password','$country','$state','$city','$address')");
            if($response==1){
                header("location:userlogin.php");
            }
            }
else{
    echo "
    <div class='alert alert-danger text-center mt-5' role='alert'>
    Please Enter All The Field
    </div>
    ";
}
        }
    ?>
    <section class="wrapper">
      <div class="form signup">
        <header>Signup</header>
<form method="post" action="">
  
    <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name">
  
    <input type="email" class="form-control" name="email" placeholder="Enter Your Email address">
  
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your Password">
  
    <input type="password" class="form-control" id="cpass" name="cpass" onblur="check()" placeholder="Confirm Your Password">
  
  <div class="select_option my-3">
            <select class="form-select country my-3" name="country" aria-label="Default select example" onchange="loadStates()">
                <option selected>Select Country</option>
            </select>
            <select class="form-select state my-3" name="state" aria-label="Default select example" onchange="loadCities()">
                <option selected>Select State</option>
            </select>
            <select class="form-select city my-3" name="city" aria-label="Default select example">
                <option selected>Select City</option>
            </select>
    </div>
    
    <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
    
  <input type="submit" name="submit" value="SignUp">
  <input type="reset" name="reset" value="Reset">
  <p>Already have an account? <a href="userlogin.php">Login now</a></p>
</form>
      </div>
    </section>
<script>
    function check(){
        var pass=document.getElementById("pass").value;
        var cpass=document.getElementById("cpass").value;
        if(pass!=cpass){
            alert("enter password correctly");
            document.getElementById("cpass").value="";
        }
    }
</script>
<script src="city.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</body>
</html>