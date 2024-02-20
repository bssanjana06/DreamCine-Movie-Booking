
<?php 
session_start();  
if (!isset($_SESSION['uname'])) {
  header("location:index.php");
}
?>

<!doctype html>
<html>
 <head>
       <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Page</title>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>


<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

<style>




.front {
    /* margin: 0px 4px 45px 0; */
    margin-left:-10px;
    margin-right:50px;
    margin-bottom:10px;
    background-color: #EDF979;
    color: #000000;
   
    padding: 9px 0;
    border-radius: 3px;
}

</style>
</head>
<body style="background-color:#222;">

    <div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6" style="color:white;">PAY HERE</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card" style="background-color:#444; color:white; border:white 50px;">
                <div class="card-header">
                     <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <div class="row">
                            
                        <?php
// Start the session
// session_start();

// Include the database connection file
include("Database.php");

// Initialize the price
$price = 0;

// Get the logged-in username from the session
$username = $_SESSION['uname'];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the selected show, seats, and other details from the POST data
    $show = $_POST['show'];
    $seats = $_POST['seat'];
    $movie = $_POST['movie'];
    $totalSeats = $_POST['totalseat'];

    // Initialize a variable to store the last processed seat
    $lastSeat = '';
    echo "Show : $show<br>";
    echo "Movie : $movie<br>";
    // Loop through selected seats to calculate the total price
    foreach ($seats as $seat) {
        // Extract the seat code
        $seatCode = strtoupper($seat);
        
        // Calculate the price for the seat (considering only the letter)
        $price += calculatePrice($seatCode);

        // Update the last processed seat
        $lastSeat = "Seat : $seat";
    }

    // Display the last processed seat
    echo "$lastSeat<br>";

    // Display the total price
    $price=$price-100;
    

    echo "Total Price : $price<br>";

    // Display booking information
}

// Function to calculate the price based on the seat code (considering only the letter)
function calculatePrice($seatCode)
{
    // Define seat prices
    $seatPrices = [
        'A' => 300,
        'B' => 150,
        'C' => 150,
        'D' => 150,
        'E' => 150,
    ];

    // Extract only the letter from the seat code
    $letter = preg_replace('/[^A-Z]/', '', $seatCode);

    // Check if the letter exists in the array, otherwise, return the default price
    return isset($seatPrices[$letter]) ? $seatPrices[$letter] : 100;
}
?>




                        <!-- credit card info-->
<div id="credit-card" class="tab-pane fade show active pt-3" style="width:1000px;">
    <div class="form-group">
        <label for="username">
            <h6>Card Owner</h6>
        </label>
        <input type="text" id="card_name" name="card_name" placeholder="Card Owner Name" class="form-control">
        <div id="validatecardname"></div>
    </div>
    <div class="form-group">
        <label for="cardNumber">
            <h6>Card number</h6>
        </label>
        <div class="input-group">
            <input type="text" id="card_number" name="card_number" placeholder="Valid card number" class="form-control">
        </div>
        <div id="validatecardnumber"></div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label>
                    <span class="hidden-xs">
                        <h6>Expiration Date</h6>
                    </span>
                </label>
                <div class="input-group">
                    <input type="date" id="ex_date" placeholder="MM" name="ex_date" class="form-control">
                </div>
                <div id="validateexdate"></div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-4">
                <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                    <h6>CVV </h6>
                </label>
                <input type="password" id="cvv" class="form-control">
            </div>
            <div id="validatecvv"></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="seatCharts-container">
            <div class="front" style="display: flex; justify-content: space-between; align-items: center;">
                <span style="text-align: left; width:100%;">Amount Payable: </span>
                <span style="text-align: right;">Rs.<?php echo $price; ?>/-</span>
            </div>
        </div>
    </div>
    <div id="msg"></div>
    <div class="card-footer">
        <button type="submit" id="payment" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
    </div>
</div>

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
    <script type="text/javascript">
    $(document).ready(function () {
    $("#payment").click(function () {
        var movie = $("#movie").val().trim();
        var time = $("#time").val().trim();
        var seat = $("#seat").val().trim();
        var totalseat = $("#totalseat").val().trim();
        var price = $("#price").val().trim();
        var card_name = $("#card_name").val().trim();
        var card_number = $("#card_number").val().trim();
        var ex_date = $("#ex_date").val().trim();
        var cvv = $("#cvv").val().trim();

        $(".error-message").html("");

        if (card_name == '') {
            showError("validatecardname", "Enter Card Name.");
            return false;
        }
        if (card_number == '') {
            showError("validatecardnumber", "Enter Card Number.");
            return false;
        }
        if (ex_date == '') {
            showError("validateexdate", "Enter Expiry Date.");
            return false;
        }
        if (cvv == '') {
            showError("validatecvv", "Enter CVV.");
            return false;
        }
    });

    function showError(elementId, errorMessage) {
        error = " <font color='red'>" + errorMessage + "</font> ";
        $("#" + elementId).html(error);
    }

    $("#payment").click(function () {
        var movie = $("#movie").val();
        var time = $("#time").val();
        var seat = $("#seat").val();
        var totalseat = $("#totalseat").val();
        var price = $("#price").val();
        var card_name = $("#card_name").val();
        var card_number = $("#card_number").val();
        var ex_date = $("#ex_date").val();
        var cvv = $("#cvv").val();

        $.ajax({
            url: 'payment_form.php',
            type: 'post',
            data: {
                movie: movie,
                time: time,
                seat: seat,
                totalseat: totalseat,
                price: price,
                card_name: card_name,
                card_number: card_number,
                ex_date: ex_date,
                cvv: cvv,
            },
            success: function (response) {
                if (response == 1) {
                    disableOrHideCheckboxes(); // Call the function to disable or hide checkboxes
                    window.location = "tickes.php";
                } else {
                    error = " <font color='red'>!Error.</font> ";
                    document.getElementById("msg").innerHTML = error;
                    return false;
                }
                $("#message").html(response);
            }
        });
    });

    // function disableOrHideCheckboxes() {
    //     // Get all checkboxes with the name "seat[]"
    //     var checkboxes = document.querySelectorAll('input[name="seat[]"]');

    //     // Iterate through checkboxes and disable or hide them
    //     checkboxes.forEach(function (checkbox) {
    //         // Uncomment one of the following lines based on your preference

    //         // Disable checkboxes
    //         // checkbox.disabled = true;

    //         // Hide checkboxes
    //         // checkbox.style.display = 'none';
    //     });
    // }
});
</script>
   </body>
</html>