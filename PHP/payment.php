<?php
session_start();
require 'mysqlconnection.php';
$con = Connect();
if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php"); //Redirecting to myrestaurant Page
}
?>

<html>

    <head>
        <title> Cart | Yummy.com </title>
    </head>

    <link rel="stylesheet" type = "text/css" href ="css/payment.css">
    <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <body>

        <!--Back to top button..................................................................................-->
        <button onclick="topFunction()" id="myBtn" title="Go to top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </button>
        <script type="text/javascript">
            function timeValidate() {
                var today = new Date();
                $starttime = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

                $stoptime = document.getElementById['pickuptime'];
                $diff = (strtotime($stoptime) - strtotime($starttime));
                alert($diff);
                if ($diff >= 30)
                    return true;
                else
                    return false;
            }
        </script>
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
                            <li><a href="home.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
                            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart
                                    (<?php
                                    if (isset($_SESSION["cart"])) {
                                        $count = count($_SESSION["cart"]);
                                        echo "$count";
                                    } else
                                        echo "0";
                                    ?>)
                                </a></li>
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



        <?php
        $gtotal = 0;

        $num1 = date("Y-m-d h-i");
        $num2 = rand(100, 2);
        $Token = $num1 . $num2;
        // $pickupTime = $_POST['pickuptime'];
        foreach ($_SESSION["cart"] as $keys => $values) {

            $F_ID = $values["food_id"];
            $foodname = $values["food_name"];
            $quantity = $values["food_quantity"];
            $price = $values["food_price"];
            $total = ($values["food_quantity"] * $values["food_price"]);
            $R_ID = $values["R_ID"];
            $username = $_SESSION["login_user2"];
            $order_date = date('Y-m-d');
            $gtotal = $gtotal + $total;
        }
        ?>


        <!--//
        //                $query = "INSERT INTO ORDERS (F_ID, foodname, price,  quantity, order_date, username, R_ID) 
        //              VALUES ('" . $F_ID . "','" . $foodname . "','" . $price . "','" . $quantity . "','" . $order_date . "','" . $username . "','" . $R_ID . "')";
        //
        //
        //                $success = $con->query($query);
        //
        //                if (!$success) {
        //                    
                   ?>-->
        <!--                    <div class="container">
                                <div class="jumbotron">
                                    <h1>Something went wrong!</h1>
                                    <p>Try again later.</p>
                                </div>
                            </div>-->

        <?php
//        }
        //   }
//    if ($success) {
//        $query = "INSERT INTO foodToken(TokenNumber, PickupTime, UserID,  R_ID) 
//              VALUES ('" . $Token . "','" . $pickupTime . "','" . $username . "','" . $R_ID . "')";
//        $success = $con->query($query);
//        $_SESSION["Token"] = $Token;
//    }
        ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Choose your payment option</h1>
            </div>
        </div>
        <br>
        <h1 class="text-center">Grand Total: &#8377;<?php echo "$gtotal"; ?>/-</h1>
        <h5 class="text-center">including all service charges. (no delivery charges applied)</h5>
        <form action="" method="POST"   onsubmit="timeValidate(); return false">

            <h5 class="text-center">Pickup Time: <input type="time" id="pickuptime" name="pickuptime"  required/></h5>
            <br>
            <h1 class="text-center">


                <button class="btn btn-warning" type="submit" id="btnBack" name="btnBack"><span class="glyphicon glyphicon-circle-arrow-left"></span> Go back to cart</button>
                <button class="btn btn-success" type="submit" id="btnonlinepay" name="btnonlinepay"><span class="glyphicon glyphicon-credit-card"></span> Pay Online</button>
                <button type="submit" id="Cash" name="Cash"  class="btn btn-success"><span class="glyphicon glyphicon-"></span> Cash On Delivery</button>
            </h1>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Something posted
              $_SESSION['pictime']=$_POST['pickuptime'];
            if (isset($_POST['Cash'])) {
                
              
                header('Location: Token.php');
            } else if (isset($_POST['btnonlinepay'])) {
                header('Location: onlinepay.php');
            } else if (isset($_POST['btnBack'])) {
                header('Location: cart.php');
            }
        }
        ?>
        <br><br><br><br><br><br>
    </body>

    <?php include_once 'footer.php'; ?>
</html>