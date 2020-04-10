        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Something posted
            if (isset($_POST['Cash'])) {
                header('Location: Token.php');
            } else if (isset($_POST['btnonlinepay'])) {
                header('Location: onlinepay.php');
            }
        }
        ?>