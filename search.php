<?php
$conn=mysqli_connect("localhost","root","","winky");
session_start();
if(isset($_GET['logout'])){
    unset($new);
    session_destroy();
    header('location:index.php');
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="icon" href="https://www.issaquahreporter.com/wp-content/uploads/2020/03/20767160_web1_T-bloodworks-nw-AUB-200306.jpg">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="style6.css" rel="stylesheet">
</head>
<body>
    <!-- nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid mx-5">
    <a class="navbar-brand mx-5" href="#">BloodDonation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="material-symbols-outlined">
            account_circle
            </span>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
        if(isset($_SESSION['email'])){
          $new=$_SESSION['email'];
          $response=mysqli_query($conn,"SELECT * FROM userregister WHERE email='$new'");
          $data=mysqli_fetch_array($response);
          $newname=$data['name'];
        echo "
        <li>Name: $newname</li>
        <li>Email: $new</li>
        <li class='nav-item'>
        <a class='nav-link active' href='search.php?logout=$new' onclick='return confirm('are your sure you want to logout?');'>logout</a>
        </li>
        ";
        }
        else{
          echo "
          <li><a href='userlogin.php' class='dropdown-item'>login</a></li>
          ";
        }
        ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <!-- nav bar -->
    <form method="post">
    <div class="searchBox">
            <input class="searchInput" type="text" name="insearch" placeholder="Search" autocapitalize="on">
            <button class="searchButton" name="search">
            <span class="material-symbols-outlined">
            search
            </span>
            </button>
        </div>
    </form>
       
    <?php
if(isset($_POST['search'])){
    $insearch=$_POST['insearch'];
    $response=mysqli_query($conn,"SELECT * FROM register WHERE bgroup='$insearch'");
echo"
<div class='container-fluid p-5'>
    <table class='table'>
    <thead style='color:orange; font-weight:bold; -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);'>
        <tr>
        <th scope='col'>ID</th>
        <th scope='col'>NAME</th>
        <th scope='col'>EMAIL</th>
        <th scope='col'>AGE</th>
        <th scope='col'>ADDRESS</th>
        <th scope='col'>CONTACT</th>
        <th scope='col'>ACTION</th>
        </tr>
    </thead>
    ";
    $i=1;
    while($row=mysqli_fetch_array($response)){
    echo"
    <tbody style='color:#491139; font-weight:bold; -webkit-backdrop-filter: blur(10px);
    backdrop-filter: blur(10px);'>
        <tr>
        <th scope='row'>$i</th>
        <td>$row[name]</td>
        <td>$row[email]</td>
        <td>$row[age]</td>
        <td>$row[address]</td>
        <td>$row[phone]</td>
        ";
        if(isset($_SESSION['email'])){
            $email=$_SESSION['email'];
            echo "
        <td>
        <a href='request.php?id=$row[id]&email=$email'><button class='btn btn-success btn-block' name='request'>Request</button></a>
        </td>
        ";
        }
        else{
            echo "
            <td>
            <button class='btn btn-success btn-block' name='notlogrequest' onclick='match()'>Request</button>
            </td>
            ";
        }
        echo "
        </tr>
    </tbody>
    ";
    $i++;
    }
}

    ?>
   </table>
</div>
   <script>
function match(){
    alert("login first");
}
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>