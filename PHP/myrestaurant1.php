<?php
include('session_manager.php');

if (!isset($login_session)) {
    header('Location: managerlogin.php'); // Redirecting To Home Page
}



$name = $con->real_escape_string($_POST['name']);
$email = $con->real_escape_string($_POST['email']);
$contact = $con->real_escape_string($_POST['contact']);
$address = $con->real_escape_string($_POST['address']);
$BlockId = $con->real_escape_string($_POST['combBlock']);

$query = "INSERT INTO RESTAURANTS(name,email,contact,address,M_ID,BlockID) VALUES('" . $name . "','" . $email . "','" . $contact . "','" . $address . "','" . $_SESSION['login_user1'] . "','" . $BlockId . "')";
$success = $con->query($query);

if (!$success) {
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>change</title>
            <link rel="stylesheet" type = "text/css" href ="css/add_food_items.css">
            <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
        </head>
        <body>
            <!--Back to top button..................................................................................-->
            <button onclick="topFunction()" id="myBtn" title="Go to top">
                <span class="glyphicon glyphicon-chevron-up"></span>
            </button>
            <!--Javacript for back to top button....................................................................-->
            <script type="text/javascript">
                window.onscroll = function ()
                {
                    scrollFunction()
                };

                function scrollFunction() {
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        document.getElementById("myBtn").style.display = "block";
                    } else {
                        document.getElementById("myBtn").style.display = "none";
                    }
                }

                function topFunction() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                }
            </script>

            <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Yummy.com</a>
                    </div>

                    <div class="collapse navbar-collapse " id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active" ><a href="home.php">Home</a></li>
                            <li><a href="aboutus.php">About</a></li>
                            <li><a href="feedback.php">Feedback</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up </a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login </a></li>
                        </ul>
                    </div>

                </div>
            </nav>
            <div class="container">
                <div class="jumbotron" style="text-align: center;">
                    <h1>Your already have one restaurant.</h1>
                    <p>Go back to your <a href="view_food_items.php">Restaurant</a></p>
                </div>
            </div>

        </body>
    </html>

    <?php
} else {
    header('Location: myrestaurant.php');
}

$con->close();
?>