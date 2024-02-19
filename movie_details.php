  <?php
session_start();

        include("Database.php");
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        $row = mysqli_fetch_array($result);
        ?>

<!DOCTYPE html>
<html>
<head>

	    <!-- Css Styles -->
          <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['movie_name'];?> Movie Details</title>



    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="  text/css">
    <link rel="stylesheet" href="css/fonts-googleapis.css" type="  text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">   

    <style>
    .timings-box {
        display: inline-block;
        margin: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
        text-align: center;
        text-decoration: none;
        color: #333;
        font-weight: bold;
    }

    .timings-box a {
        color: #333;
        text-decoration: none;
    }

    .timings-box:hover {
        background-color: #e0e0e0;
    }
</style>

    
</head>
<body>
<?php
include("header.php");
?>

<section id="aboutUs">
  <div class="container">
<?php
        include("Database.php");
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_movie WHERE id = '".$id."'");
        
        
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
        ?>
    <div class="row feature design">
        <div class="col-lg-5"> <img src="admin/image/<?php echo $row['image']; ?>" class="resize-detail" style="width:100%; height:500px;" alt=""> </div>

      <div class="col-lg-7" style="margin-left:550px; margin-top:-500px;">
        
        <table class="content-table">
          <thead><tr>
            <th colspan="2">Movie Details</th>
          </tr>
        </thead>
       
          <tbody>
          <tr>
            <td>Movie Name</td><td><?php echo $row['movie_name'];?></td>
          </tr>
          <tr>
            <td>Release Date</td><td><?php echo $row['release_date'];?></td>
          </tr>
          <tr>
            <td>Director Name</td><td><?php echo $row['director'];?></td>
          </tr>
          <tr>
            <td>Category</td><td><?php echo $row['category'];?></td>
          </tr>
          <tr>
            <td>Language</td><td><?php echo $row['language'];?></td>
          </tr>
         
          <tr>
    <td>Trailer</td>
    <td>
        <a href="<?php echo $row['you_tube_link']; ?>?autoplay=1" target="_blank">View Trailer</a>
    </td>
</tr>

          
          </tbody>
            
          
        </table>
        <h3 style="font-size:20px; margin-bottom:5px;">Show Timings</h3>
        <?php 
$time = $row['show'];
$movie = $row['movie_name'];
$set_time = explode(",", $time);

$res = mysqli_query($conn, "SELECT * FROM theater_show");

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_array($res)) {
        if (in_array($row['show'], $set_time)) {
            ?>
            <div class="timings-box">
                <a href="seatbooking.php?movie=<?php echo $movie; ?>&time=<?php echo $row['show']; ?>">
                    <?php echo $row['show']; ?>
                </a>
            </div>
            <?php
        }
    }
}
          }
        }
?>
</div>
</div>
    <div class="description">
      <h4 style="font-size:25px;">Description</h4>
      <?php
include("database_connection.php");

// Assuming you have the movie ID in the URL parameter
if (isset($_GET['pass']) && !empty($_GET['pass'])) {
    $movieId = $_GET['pass'];

    // Fetch movie details from the database
    $query = "SELECT description FROM add_movie WHERE id = :movie_id";
    $statement = $connect->prepare($query);
    $statement->bindParam(':movie_id', $movieId, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if the movie details were found
    if ($result) {
        $description = $result['description'];

        // Display the description
        echo '<div style="font-size: 20px; text-align:justify;font-style:italic;">' . $description . '</div>';

    } else {
        // Movie not found
        echo "Movie not found.";
    }
} else {
    // Invalid or missing movie ID
    echo "Invalid or missing movie ID.";
}
?>

    </div>
    </div>
  
</section>

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