<!-- Header Section Begin -->
<header class="header" style="background-color: #222; color: white;">
    <div class="header__top" style="background-color:black;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7"></div>
                <?php
                include("Database.php");
                if (isset($_SESSION['uname'])) {
                    $uname = $_SESSION['uname'];
                    $result = mysqli_query($conn,"SELECT * FROM user WHERE username ='".$uname."'");
                    ?>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links">
                                <?php 
                                if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_array($result)) {
                                        if(isset($row['image']) && $row['image'] != '') {
                                            echo '<img src="admin/image/' . $row["image"] . '" alt="Avatar" class="avatar">';
                                        } else {
                                            echo '<img src="image/img_avatar.png" alt="Avatar" class="avatar">';
                                        }
                                    }
                                }
                                ?>
                                <span>Hi <?php echo $_SESSION['uname'];?></span>
                                <a href="logout.php"> Logout</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right" style="color:white;">
                            <div class="header__top__links" style="margin-right:0px;">
                                <a href="login_form.php">Sign in</a>
                                <a href="register_form.php">Register</a>
                            </div>
                        </div>
                    </div>
                    <?php  
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <img src="img/logo1.png" alt="Theater" class="img-fluid" style="max-width: 200px; margin-top:5px;">
                </div>
            </div>
            <div class="col-lg-9 col-md-9 d-flex justify-content-end">
                <nav class="header__menu mobile-menu" style="margin-top:-10px;color:white;">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="allmovie.php">All Movies</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="./feedback.php">Feedback</a></li>
                        <li><a href="./contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="canvas__open"><i class="fa fa-bars"></i></div>
</header>
<!-- Header Section End -->
