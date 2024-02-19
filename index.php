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
    <title>Home Page</title>
    <link rel="icon" href="https://cdn-icons-png.freepik.com/512/8145/8145721.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="style5.css">
  </head>
<body>
    <!-- nav bar -->
<!-- Header -->
<header class="header">
      <nav class="nav">
        <a href="#" class="nav_logo">BloodDonation</a>
        <ul class="nav_items">
          <li class="nav_item">
            <a href="index.php" class="nav_link">Home</a>
            <a href="donorlogin.php" class="nav_link">Donor</a>
            <a href="userlogin.php" class="nav_link">User</a>
            <a href="search.php" class="nav_link">Search</a>
          </li>
        </ul>
        <!-- <button class="button" id="form-open"> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;">
          <span class="material-symbols-outlined" style="color:white;">
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
        <a class='nav-link active' href='index.php?logout=$new' onclick='return confirm('are your sure you want to logout?');'>logout</a>
        </li>
        ";
        }
        else{
          echo "
          <a href='userlogin.php' style='text-decoration:none; color:#333'><li>login</li></a>
          ";
        }
        ?>
          </ul>
        </li>
        <!-- </button> -->
      </nav>
    </header>
    <!-- nav bar -->

    <!-- slide bar -->
    <div id="carouselExampleControls" class="carousel slide home" data-bs-ride="carousel">
  <div class="carousel-inner home">
    <div class="carousel-item active home">
      <img src="https://as1.ftcdn.net/v2/jpg/06/58/86/20/1000_F_658862083_hvEH7I4CdI854OCZlqJZXcPLoW7sslFh.jpg" class="d-block w-100" alt="image">
    </div>
    <div class="carousel-item home">
      <img src="https://t4.ftcdn.net/jpg/05/52/90/05/360_F_552900530_D4WF1c3zGsvIGfLgKaRBrEmbvPlk6O6E.jpg" class="d-block w-100" alt="image">
    </div>
    <div class="carousel-item home">
      <img src="https://media.istockphoto.com/id/637957146/photo/blood-type-touch-screen-concept.jpg?s=612x612&w=0&k=20&c=eqW9JzYLzv-rsqHgMgnPapyv2P7i0lS1Vs48AkdMGsw=" class="d-block w-100" alt="image">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <!-- footer -->

    <!-- Footer Start -->
    <footer>
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">    
    <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="#">About Us</a>
                    <a class="btn btn-link" href="#">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-sm-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kolata,Westbengal,7000052</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+91 7001967699</p>
                    <p class="mb-2"><a href=""><i class="fa fa-envelope me-3"></i></a>tandrima2000@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/tandrima_2k/"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/tandrima.ghosh.374/"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/tandrima06/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-10">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="https://www.shutterstock.com/image-vector/blood-donation-illustration-concept-bag-600nw-2156013083.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="https://cdn.vectorstock.com/i/preview-1x/18/97/human-blood-donate-on-white-background-vector-42761897.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="https://images.pexels.com/photos/6823567/pexels-photo-6823567.jpeg?cs=srgb&dl=pexels-artem-podrez-6823567.jpg&fm=jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="https://m.economictimes.com/thumb/msid-83502809,width-1200,height-900,resizemode-4,imgsize-353228/blood-donation_istock.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="https://stanfordbloodcenter.org/wp-content/uploads/2020/06/Blood-facts_10-illustration-graphics__canteen.png" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="https://static.vecteezy.com/system/resources/thumbnails/001/978/288/small/volunteer-collecting-blood-donation-free-vector.jpg" alt="">
                        </div>
                    </div>
                </div>
               
        
    <!-- Footer End -->

        <div class="cpyrt container text-center">
            <a href="">Conditions of Use</a>
            <a href="">Privacy Notice</a>
            <a href="">Your Ads Privacy Choices</a><br>
            <p>&copy 1996-2023, BloodBank.com, Inc. or its affiliates</p>
            <p>With <i class="fa-solid fa-heart" style="color: red;"></i> Tandrima Ghosh</p>
        </div>

        
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>