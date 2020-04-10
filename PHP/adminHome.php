<?php
require 'mysqlconnection.php';
$con = Connect();//call the caonection calasss
session_start(); // Starting Session

if (!isset($_SESSION['superadmin'])) {
    header('Location: managerlogin.php'); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title> Administrator | Yummy.com </title>
    </head>

    <link rel="stylesheet" type = "text/css" href ="css/myrestaurant.css">
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
                        <li><a href="feedbackview.php">Show Feedback</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Administrator </a></li>

                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                    </ul>
                </div>

            </div>
        </nav>




        <div class="container">

            <h1>Administrator! </h1>
            <p>Manage all your restaurant and Users from here</p>

        </div>
        <div class="container">
            <div class="container">
                <div class="col">

                </div>
            </div> 
            <div class="col-xs-3" style="text-align: center;">

                <div class="list-group">
                    <a href="adminHome.php" class="list-group-item active">View Users</a>
                    <a href="adminRestaurant.php" class="list-group-item ">View Restaurant</a>
                      <a href="adminManager.php" class="list-group-item ">View Manager</a>

                </div>
            </div>
            <div class="col-xs-9">
                <div class="form-area" style="padding: 0px 100px 100px 100px;">
                    <form action="" method="POST">
                        <br style="clear: both">
                        <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> User LIST </h3>


                        <?php
// Storing Session
                        
                        $sql = "select * from customer ";
                        $result = mysqli_query($con, $sql);


                        if (mysqli_num_rows($result) > 0) {
                            ?>

                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr class="thhead">
                                        <th>  </th>
                                        
                                        <th> username  </th>
                                        <th> full name </th>
                                        <th> email </th>
                                        <th> contact </th>
                                         <th> address </th>
                                    </tr>
                                </thead>

                                <?PHP
                                //OUTPUT DATA OF EACH ROW
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                    <tbody>
                                        <tr>
                                            <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><?php echo $row["fullname"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            <td><?php echo $row["contact"]; ?></td>
                                            <td><?php echo $row["address"]; ?></td>
                                        </tr>
                                    </tbody>

                                <?php } ?>
                            </table>
                            <br>


                        <?php } else { ?>

                            <h4><center>0 RESULTS</center> </h4>

                        <?php } ?>

                    </form>


                </div>

            </div>
        </div>

    </body>
    <?php include_once 'footer.php'; ?>
</html>
