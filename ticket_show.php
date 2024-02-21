<?php
session_start();
if (!isset($_SESSION['uname'])) {
  header("location:index.php");
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Booking Summary</title>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>


<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
 
</head>
<body style="background-color:#222;">

 <div class="container py-5">
    
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">

            <h1 class="display-6" style="color:white;">BOOKING SUMMARY</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
<div class="card ">
                <div class="card-header" style="background-color:#222; color:white;">
                    <center><img src="img/logo1.png" width="40%">
                    <h6 style="color:white; margin-top:15px;"> DreamCine, 789 Cinema Avenue, Block B,Mysuru</h6></center>
                    <?php 
                  include "Database.php";
                  $result = mysqli_query($conn,"SELECT c.movie,c.booking_date,c.show_time,c.seat,c.totalseat,c.price,c.payment_date,c.customer_id,u.username,u.email,u.mobile,u.city,t.theater FROM customers c INNER JOIN user u on c.uid=u.id INNER JOIN theater_show t on c.show_time=t.show WHERE customer_id = '".$_SESSION['customer_id']."'");
                  
                  $row = mysqli_fetch_array($result);
                 
                ?>
                    <table style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="padding: 10px; color:white;">Customer Id: <?php echo $row['customer_id'];?></td>
    </tr>
    <tr>
        <td style="padding: 10px; color:white;">Date: <?php echo $row['payment_date'];?></td>
    </tr>
</table>
<hr>

<center><h3>Movie Name: <?php echo $row['movie'];?></h3></center>

<div style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;">
    <h4>User Details:</h4>
    <div><strong>Name:</strong> <?php echo $row['username'];?></div>
    <div><strong>City:</strong> <?php echo $row['city'];?></div>
    <div><strong>Email:</strong> <?php echo $row['email'];?></div>
    <div><strong>Phone:</strong> <?php echo $row['mobile'];?></div>
</div>

<div style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;">
    <h4>Payment Details:</h4>
    <div><strong>Payment Date:</strong> <?php echo $row['payment_date'];?></div>
    <div><strong>Payment Amount:</strong> RS. <?php echo $row['price'];?>/-</div>
</div>

<hr>

<h4>Booking Details:</h4>

<div style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;">
    <div><strong>Theater:</strong> No. <?php echo $row['theater'];?></div>
    <div><strong>Date:</strong> <?php echo $row['booking_date'];?></div>
    <div><strong>Time:</strong> <?php echo $row['show_time'];?></div>
</div>

<div style="margin-top: 20px; padding: 10px; border: 1px solid #ccc;">
<div><strong>Seats:</strong> <?php echo implode(', ', array_unique(explode(',', $row['seat']))); ?></div>

    <div><strong>Total Seats:</strong> <?php echo $row['totalseat'];?></div>
</div>

                </div>
                <a href="download_summary.php" class="btn btn-primary">Download Summary</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>