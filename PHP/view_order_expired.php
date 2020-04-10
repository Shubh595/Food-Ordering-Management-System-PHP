<?php
include('session_manager.php');

if (!isset($login_session)) {
    header('Location: managerlogin.php'); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title> Manager Login | Yummy.com </title>
    </head>

    <link rel="stylesheet" type = "text/css" href ="css/view_order_details.css">
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

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?> </a></li>
                        <li class="active"> <a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                    </ul>
                </div>

            </div>
        </nav>




        <div class="container">
            <div class="jumbotron">
                <h1>Hello Manager! </h1>
                <p>Manage all your restaurant from here</p>

            </div>
        </div>

        <div class="container">
            <div class="container">
                <div class="col">

                </div>
            </div>


            <div class="col-xs-3" style="text-align: center;">

                <div class="list-group">
                    <a href="myrestaurant.php" class="list-group-item ">My Restaurant</a>
                    <a href="view_food_items.php" class="list-group-item">View Food Items</a>
                    <a href="add_food_items.php" class="list-group-item ">Add Food Items</a>
                    <a href="edit_food_items.php" class="list-group-item ">Edit Food Items</a>
                    <a href="delete_food_items.php" class="list-group-item ">Delete Food Items</a>
                    <a href="view_order_details.php" class="list-group-item ">View Order Details</a>

                    <a href="view_order_expired.php" class="list-group-item active">View Order Expired</a>
                </div>
            </div>




            <div class="col-xs-9">
                <div class="form-area" style="padding: 0px 0px 0px 0px;">
                    <form action="" method="POST">

                        <h5 style="margin-bottom: 0px; text-align: center; font-size: 20px;"> Expired ORDER LIST </h5>

                        <?php
// Storing Session
                        $user_check = $_SESSION['login_user1'];
                        $sql = "SELECT * FROM orders o WHERE o.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY order_date";
                        $result = mysqli_query($con, $sql);


                        if (mysqli_num_rows($result) > 0) {
                            ?>

                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr class="thhead">
                                        <th>  </th>
                                        <th> Order ID </th>
    <!--                                        <th> Food ID </th>-->
    <!--                                        <th> Order Date </th>-->
                                        <th> Food Name </th>
                                        <th> Price </th>
                                        <th> Quantity </th>
                                        <th> Customer </th>
                                        <th> Pickup Time </th>
                                        <th> Token </th>
                                        <th> Status </th>
                                        <th> Action</th>
                                    </tr>
                                </thead>

                                <?PHP
                                //OUTPUT DATA OF EACH ROW
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                    <tbody>
                                        <tr>
                                            <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
                                            <td><?php echo $row["order_ID"]; ?></td>
                                            <td><?php echo $row["foodname"]; ?></td>
                                            <td><?php echo $row["price"]; ?> </td>
                                            <td><?php echo $row["quantity"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><?php echo $row["pickupTime"]; ?></td>
                                            <td><?php echo $row["TokenNumber"]; ?></td>
                                            <td><?php echo $row["status"]; ?> </td>
                                            <td><a href="deleteOrder.php?id=<?php echo $row["order_ID"]; ?>">Delete Order</a> </td>

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
        <br>
        <br>
        <br>
        <br>

    </body>
    <?php include_once 'footer.php'; ?>
</html>