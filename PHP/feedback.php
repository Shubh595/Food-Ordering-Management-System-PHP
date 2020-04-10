<?php
session_start();
require 'mysqlconnection.php';
$con = Connect();
if (!empty($_POST)){
if (isset($_POST['submit'])) {

    $cName = $_POST['name'];
    $email = $_POST['email'];
    $csubject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO feedbacks (cName, email, csubject,  message) 
              VALUES ('" . $cName . "','" . $email . "','" . $csubject . "','" . $message . "')";
    $success = $con->query($query);
    
    if (!$success) {
        ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Something went wrong!</h1>
                <p>Try again later.</p>
            </div>
        </div>

        <?php
    }
        if ($success) {
        ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Thank You!</h1>
                <p>Get touch soon.</p>
            </div>
        </div>

        <?php
    }
}}
?>

<html>

    <head>
        <title> Feedback | Yummy.com </title>
    </head>

    <link rel="stylesheet" type = "text/css" href ="css/contactus.css">
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
                        <li class="active"><a href="feedback.php">Feedback</a></li>
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
                                    <?php
                                    if (isset($_SESSION["cart"])) {
                                        $count = count($_SESSION["cart"]);
                                        echo "$count";
                                    } else {
                                        echo "0";
                                    }
                                    ?>
                                </a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                        </ul>
                        <?php
                    } else {
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
        <br>

        <div class="heading">
            <strong>Want to Give Feedback <span class="edit"> Yummy.com </span>?</strong>
            <br>
            Here are a few ways to get in touch with us.
        </div>

        <div class="col-xs-12 line"><hr></div>

        <div class="container" >
            <div class="col-md-5" style="float: none; margin: 0 auto;">
                <div class="form-area" >
                    <form   method="POST" action="feedback.php">

                        <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;">  Feedback Form</h3>

                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" required >
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="140" rows="7" required=""></textarea>
                            <span class="help-block"><p id="characterLeft" class="help-block">Max Character length : 140 </p></span>
                        </div> 
                        <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Submit Form</button>    
                    </form>


                </div>
            </div>

        </div>

        <div class="paragraph1">

            <p><h3>We are here to answer any queries you may have about our <font color="green"><strong>Yummy.com</strong></font> experiences. Reach out to us and we will respond as soon as we can.</h3></p>
        <p><h3>Even if there is something you always wanted to experience and could not find it on <font color="green"><strong>Yummy.com</strong></font>, please do let us know and we here at <font color="green"><strong>Yummy.com promise to do our best to find it for you and suggest you the best of best.</strong></font> </h3></p>
    <p><b><h3>Contact Details of Team Yummy.com are given below.</h3></b></p>
    <p class="edit2">

        <strong>Email      :</strong>  <a href="Yummy.comhelp@gmail.com">Yummy.help@gmail.com</a>
        |
        <strong>Telephone  :</strong>  0000000000

    </p>
    <p class="edit2"><strong>Get in touch with us on Social Media.</strong></p>
    <pre><a href="https://www.facebook.com/" target="_blank"><img src="images/facebook.jpg" width="50px" height="50px"></a>  <a href="https://twitter.com/login" target="_blank"><img src="images/googleplus.png" width="50px" height="50px"></a>  <a href="https://www.instagram.com/accounts/login/" target="_blank"><img src="images/twitter.jpg" width="50px" height="50px"></a>  <a href="https://www.facebook.com/" target="_blank"><img src="images/insta.jpg" width="50px" height="50px"></a></pre>
        <p class="edit2">We even provide you a platform to share your food experiences and reviews by mailing it to us at <a href="Yummy.com@gmail.com">Yummy@gmail.com</a> </p>
      

</div>
     </body>

<?php include_once 'footer.php'; ?>
</html>