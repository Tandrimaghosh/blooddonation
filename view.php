<?php
$conn=mysqli_connect("localhost","root","","winky");
session_start();
if(isset($_GET['logout'])){
    unset($oldid);
    session_destroy();
    header('location:index.php');
  };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Page</title>
    <link rel="icon" href="https://media.istockphoto.com/id/1438179747/vector/blood-bag-vector-icon-donate-packet-realistic-illustration-world-donor-day-sign-medical.jpg?s=612x612&w=0&k=20&c=OW3dCW25rpzcBysZ7ztpeygd-tiljyjdFql3wee3qSw=">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background: url('https://www.shutterstock.com/image-illustration/long-dark-hospital-corridor-rooms-600nw-2153166539.jpg'); background-size:cover;">
    <?php
        $oldid=$_SESSION['oldid'];
        $bgroup=$_SESSION['bloodgroup'];
        $response=mysqli_query($conn,"SELECT * FROM request WHERE bgroup='$bgroup'");
        echo "
        <div class='container-fluid p-5'>
        <table class='table' style='color:white; -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px); font-wieght:bold;'>
        <thead>
          <tr>
            <th scope='col'>ID</th>
            <th scope='col'>USER NAME</th>
            <th scope='col'>DONOR EMAIL</th>
            <th scope='col'>DATE</th>
            <th scope='col'>PURPOSE</th>
            <th scope='col'>ADDRESS</th>
          </tr>
        </thead>
        ";
        $i=1;
        while($row=mysqli_fetch_array($response)){
            echo "
        <tbody>
          <tr>
            <th scope='row'>$i</th>
            <td>$row[username]</td>
            <td>$row[donoremail]</td>
            <td>$row[date]</td>
            <td>$row[purpose]</td>
            <td>$row[address]</td>
          </tr>
        </tbody>
        ";
        $i++;
    }
    
    ?>
    </table>
</div>
<footer style="position: fixed;
  bottom: 0; right:0;">
<button class="btn btn-danger">
<a style="text-decoration:none; color:white;" href="request.php?logout=<?php echo $oldid; ?>" onclick="return confirm('are your sure you want to logout?');">Logout</a>
</button>
</footer>
</body>
</html>