<?php
session_start();

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php"); //Redirecting to myrestaurant Page
}
?>


<html>

    <head>
        <title> Food Court | Yummy.com </title>
    </head>

    <link rel="stylesheet" type = "text/css" href ="css/foodlist.css">
    <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

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
                        <li><a href="home.php">Home</a></li>
                        <li><a href="aboutus.php">About</a></li>
                        <li><a href="feedback.php">Feedback</a></li>

                    </ul>

                    <?php
                    if (isset($_SESSION['login_user1'])) {
                        ?>


                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
                            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                        </ul>
    <?php
} else if (isset($_SESSION['login_user2'])) {
    ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
                            <li class="active" ><a href="home.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
                            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
                    if (isset($_SESSION["cart"])) {
                        $count = count($_SESSION["cart"]);
                        echo "$count";
                    } else
                        echo "0";
    ?>) </a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                        </ul>
                                    <?php
                                }
                                else {
                                    ?>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                                <ul class="dropdown-menu">
                                    <li> <a href="customersignup.php"> User Sign-up</a></li>
                                    <li> <a href="managersignup.php"> Manager Sign-up</a></li>
                                    <li> <a href="#"> Admin Sign-up</a></li>
                                </ul>
                            </li>

                            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li> <a href="customerlogin.php"> User Login</a></li>
                                    <li> <a href="managerlogin.php"> Manager Login</a></li>
                                    <li> <a href="#"> Admin Login</a></li>
                                </ul>
                            </li>
                        </ul>

    <?php
}
?>


                </div>

            </div>
        </nav>

        <!-- Carousal ================================================================ -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item active">
                    <img src="images/slide001.jpg" style="width:100%;">
                    <div class="carousel-caption">
                    </div>
                </div>

                <div class="item">
                    <img src="images/slide002.jpg" style="width:100%;">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="images/slide003.jpg" style="width:100%;">
                    <div class="carousel-caption">

                    </div>
                </div>

            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Carousal End -->

        <div class="normal">
            <div class="container text-center">
                <h1>Yummy.com</h1>      
                <p>Let choose your shop</p>
            </div>
        </div>




        <div class="container" style="width:95%;">

            <!-- Display all Food from food table -->
<?php
require 'mysqlconnection.php';
$con = Connect();



$sql = "SELECT * FROM RESTAURANTS  where BlockID=$_GET[blockid] ORDER BY R_ID";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0)
{

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
                    <div class="col-md-4">

                        <form method="post" action="foodlist.php?shopid=<?php echo $row["R_ID"]; ?>">
                            <div class="mypanel" align="center">
                                <img src="images/shop.png" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["name"]; ?></h5>
                                <h5 class="text-info"><?php echo $row["email"]; ?></h5>
                                <h5 class="text-danger">Mob. <?php echo $row["contact"]; ?></h5>


                                <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Go">
                            </div>
                        </form>


                    </div>

        <?php
    }
} else {
    ?>

                <div class="container">
                    <div class="jumbotron">
                        <center>
                            <label style="margin-left: 5px;color: red;"> <h1>Oops! No Shop is available.</h1> </label>
                            <p>Stay Hungry...! :P</p>
                             
                        </center>

                    </div>
                </div>

    <?php
}
?>

        </div>

    </body>
<?php include_once 'footer.php'; ?>
</html>