<?php
$conn=mysqli_connect("localhost","root","","winky");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Page</title>
    <link rel="icon" href="https://www.shutterstock.com/image-vector/blood-collection-transfusion-icon-donor-600nw-2129911235.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style7.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
 
  </head>
<body>
    <?php
$id=$_GET['id'];
$useremail=$_SESSION['email'];
$userresult=mysqli_query($conn,"SELECT * FROM userregister WHERE email='$useremail'");
$newrow=mysqli_fetch_array($userresult);
$response=mysqli_query($conn,"SELECT * FROM register WHERE id='$id'");
$row=mysqli_fetch_array($response);
if(isset($_POST['request'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $bgroup=$_POST['bgroup'];
  $date=$_POST['date'];
  $purpose=$_POST['purpose'];
  $address=$_POST['address'];
  if($date!="" && $purpose!="" && $address!=""){
  $success=mysqli_query($conn,"INSERT INTO request(username,donoremail,bgroup,date,purpose,address) VALUES('$name','$email','$bgroup','$date','$purpose','$address')");
if($success==1){
  echo "
  <div class='alert alert-success text-center' role='alert'>
  <img src='https://cdn.pixabay.com/photo/2012/04/24/16/22/check-40319_640.png' class='rounded img-thumbnail text-center' style='height:150px; width:150px'>
  <p class='text-center'>Your request has been submitted successfuly. Donor will contact you soon</p>
  <p class='text-center'>please logout from the portal</p>
  </div>
";
}
else{
  echo "Failed to request";
}
  }
  else{
    echo"
    <div class='alert alert-danger text-center' role='alert' style='color:blue;'>
    Please Fill All The Field!!
    </div>
    ";
  }
}
if(isset($_GET['logout'])){
  unset($useremail);
  session_destroy();
  header('location:index.php');
};
    ?>

    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Request Form</span></div>
<form method='post'>
Requested By
  <div class='row'>
    <input type='text' class='form-control' value='<?= $newrow['name'] ?>' name="name" readonly>
    </div>
    Requested to
  <div class='row'>
    <input type='email' class='form-control' value='<?= $row['email'] ?>' readonly name="email">
  </div>
  Blood Group
  <div class='row'>
    <input type='email' class='form-control' value='<?= $row['bgroup'] ?>' readonly name="bgroup">
  </div>
  <div class='row'>
    <input type='date' class='form-control' name="date" placeholder="Enter Date">
  </div>
  <div class='row'>
    <input type='text' class='form-control' name="purpose" placeholder="Enter The Purpose For Finding Blood">
  </div>
  <div class='row'>
    <input type='text' class='form-control' name="address" placeholder="Enter Your Address">
  </div>
  <div class="row button">
  <input type='submit' name='request' value="Request">
  </div>
  <a style="color: #333; text-decoration: none; margin-left:2px;" href="request.php?logout=<?php echo $useremail; ?>" onclick="return confirm('are your sure you want to logout?');">logout</a>

  <a style="color: #333; text-decoration: none; margin-left:45%;" href="search.php">Back To Search</a>
</form>
      </div>
    </div>
</body>
</html>