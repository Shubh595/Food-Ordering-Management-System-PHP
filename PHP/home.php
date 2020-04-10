<?php
session_start();
require 'mysqlconnection.php';
$con = Connect(); //call the caonection calasss
?>

<html>

    <head>
        <title> Home | Yummy.com </title>
        <style>
            .container {
                position: relative;
                width: 50%;
            }

            .image {
                opacity: 1;
                display: block;

                transition: .5s ease;
                backface-visibility: hidden;
            }

            .middle {
                transition: .5s ease;
                opacity: 0;
                position: absolute;
                top: 50%;
                left: 10%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center;
            }

            .container:hover .image {
                opacity: 0.3;
            }

            .container:hover .middle {
                opacity: 1;
            }

            .text {
                background-color: #4CAF50;
                color: white;
                font-size: 16px;
                padding: 16px 32px;
            }
        </style>
    </head>

    <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

    <link rel="stylesheet" type = "text/css" href ="css/index.css">

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

                                </ul>
                            </li>

                            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li> <a href="customerlogin.php"> User Login</a></li>
                                    <li> <a href="managerlogin.php"> Manager Login</a></li>

                                </ul>
                            </li>
                        </ul>

                        <?php
                    }
                    ?>


                </div>

            </div>
        </nav>

    <center> <h1>Choose Your Block</h1></center> 
    <br>

    <div class="wide2">
        <?php
        $result = mysqli_query($con, "Select DISTINCT * from block");
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="col-xs-3 box"  >
                <div class="container" style="margin-top: 30px">
                    <img src="<?php echo $row['blockImage']; ?>" class="image" height="200px" width="200px" style="border: #265a88 dashed thin">
                    
                    <div class="middle">
                        <div class="text"><a class="btn btn-success btn-lg" href="customerlogin.php?blockid=<?php echo $row["blockID"]; ?>" role="button" ><?php echo $row["blockName"]; ?> </a></div>
                    </div>
                  
                </div>
            </div>
        <?php } ?>  

    </div>

    <br/>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

<?php include_once 'footer.php'; ?>
</html>