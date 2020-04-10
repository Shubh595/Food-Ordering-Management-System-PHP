

<?php

if (empty($_POST))
{
$gtotal = 0;

$num1 = date("Y-m-d h-i");
$num2 = rand(100, 2);
$Token = $num1 . $num2;
$pickupTime =$_POST['pickuptime'] ;
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

    $query = "INSERT INTO ORDERS (F_ID, foodname, price,  quantity, order_date, username, R_ID) 
              VALUES ('" . $F_ID . "','" . $foodname . "','" . $price . "','" . $quantity . "','" . $order_date . "','" . $username . "','" . $R_ID . "')";


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
}
if ($success) {
    $query = "INSERT INTO foodToken(TokenNumber, PickupTime, UserID,  R_ID) 
              VALUES ('" . $Token . "','" . $pickupTime . "','" . $username . "','" . $R_ID . "')";
    $success = $con->query($query);
    $_SESSION["Token"] = $Token;
}
}
?>