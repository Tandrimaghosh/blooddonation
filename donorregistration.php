<?php
$conn=mysqli_connect("localhost","root","","winky");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration Page</title>
    <link rel="icon" href="https://static.vecteezy.com/system/resources/previews/020/967/309/original/red-blood-icon-free-png.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style2.css">
  </head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['pass'];
            $cpassword=$_POST['cpass'];
            $age=$_POST['age'];
            $bgroup=$_POST['bgroup'];
            $country=$_POST['country'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
if($name!="" && $email!="" && $password!="" && $cpassword!="" && $age!="" && $bgroup!="" && $address!="" && $phone!=""){
            $state=$_POST['state'];
            $city=$_POST['city'];          
      $response=mysqli_query($conn,"INSERT INTO register(name,email,password,age,bgroup,country,state,city,address,phone) VALUES('$name','$email','$password','$age','$bgroup','$country','$state','$city','$address','$phone')");
            if($response==1){
                header("location:donorlogin.php");
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
    <div class="wrapper">
    <h2>Registration</h2>
<form method="post" action="">
  <div class="input-box">
    <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name">
  </div>
  <div class="input-box">
    <input type="email" class="form-control" name="email" placeholder="Enter Your Email address">
  </div>
  <div class="input-box">
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your Password">
  </div>
  <div class="input-box">
    <input type="password" class="form-control" id="cpass" name="cpass" onblur="check()" placeholder="Confirm Password">
  </div>
  <div class="input-box">
    <input type="text" class="form-control" name="age" placeholder="Enter Your Age">
  </div>
  <div class="input-box">
    <input type="text" class="form-control" name="bgroup" autocapitalize="on" placeholder="Enter Your Blood Group">
  </div>
  <div class="select_option">
            <select class="form-select country input-box" name="country" aria-label="Default select example" onchange="loadStates()">
                <option selected>Select Country</option>
            </select>
            <select class="form-select state input-box" name="state" aria-label="Default select example" onchange="loadCities()">
                <option selected>Select State</option>
            </select>
            <select class="form-select city input-box" name="city" aria-label="Default select example">
                <option selected>Select City</option>
            </select>
    </div>
    <div class="input-box">
    <input type="text" class="form-control" name="address" placeholder="Enter Your Address">
    </div>
    <div class="input-box">
    <input type="text" class="form-control" name="phone" placeholder="Enter Your Valid Phone Number">
  </div>
  <button type="submit" class="btn btn-primary input-box button" name="submit">Register Now</button>&nbsp;
  <button type="reset" class="btn btn-primary input-box button" name="reset">Reset</button>
  <div class="text">
        <h3>Already have an account? <a href="donorlogin.php">Login now</a></h3>
  </div>
</form>
    </div>
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