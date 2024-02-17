   <?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie Ticket Booking System</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    


    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="  text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">    
</head>

<body style="background-color:#222; color:white;">



<?php 

include("header.php");

?>

<div class="container">
   <img src=image/theater_1.jpeg alt="" class="image-resize" style="width: 100%; height: 500px;">
</div>

<div class="container">
<style>
  @keyframes typeWriter {
    from { width: 0; }
    to { width: 100%; }
  }

  h3.move-effect {
    overflow: hidden;
    white-space: nowrap;
    margin: 0 auto; /* Center the text */
    animation: typeWriter 4s steps(35) infinite; /* Slower animation (4s) */
  }
</style>
<h3 class="move-effect" style="color: white; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-style: italic; margin-top:15px; margin-bottom:20px;text-align:center;">Ongoing Movies</h3>
     <div class="row">
<?php
include("Database.php");
$result = mysqli_query($conn,"SELECT * FROM add_movie");

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) {
      if($row['action']== "running"){
    ?>
    
          <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="running-movie">
            <img src="image/<?php echo $row['image'];?>" alt="Movie Image" class="image-container image-resize2" style="width: 200px height:200px;">
              <!-- Use an anchor tag with the YouTube video URL -->
<a href="<?php echo $row['you_tube_link'];?>?autoplay=1" target="_blank">
<img src="img/icon/play.png" alt="Play Trailer" style="width: 60px; height: 40px; margin-top:10px; margin-bottom:10px;">
</a>

                <h5 style="color:white;"><b><?php echo $row['movie_name'];?></b></h5>
                <h6 style="color:#EBEDEF;"><center><?php echo $row['language'];?></center></h6>
               <a href="movie_details.php?pass=<?php echo $row['id'];?>" class="btn btn-primary">Book Now</a>
            </div>
           </div>
           
           <div class="modal fade" id="trailer_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <embed style="width: 820px; height: 450px;" src="<?php echo $row['you_tube_link'];?>"></embed>
              </div>
            </div>
          </div> 
           
  <?php
}
  }
}
?>
</div>
      </div> 

      <div class="container">
<style>
  @keyframes typeWriter {
    from { width: 0; }
    to { width: 100%; }
  }

  h3.move-effect {
    overflow: hidden;
    white-space: nowrap;
    margin: 0 auto; /* Center the text */
    animation: typeWriter 4s steps(35) infinite; /* Slower animation (4s) */
  }
</style>
<h3 class="move-effect" style="color: white; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-style: italic; margin-top:15px; margin-bottom:20px;text-align:center;">Upcoming Movies</h3>
    <div class="row">
    <?php
include("Database.php");
$result = mysqli_query($conn, "SELECT * FROM add_movie");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        if ($row['action'] == "upcoming") {
?>
           <div class="image-box">
    <div class="col-lg-2 col-md-3 col-sm-6">
        <div class="card" style="width: 10rem; height:12rem;">
            <a href="<?php echo $row['you_tube_link']; ?>" target="_blank" class="card-link">
                <img class="card-img-top image-resize4" src="admin/image/<?php echo $row['image']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title" style="color:white;"><?php echo $row['movie_name']; ?></h5>
                    <p class="card-text" style="color:white;">Director: <?php echo $row['director']; ?></p>
                </div>
            </a>
        </div>
    </div>
</div>

<?php
        }
    }
}
?>


</div>
</div>



   <?php
   include("footer.php");
   ?>


    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>