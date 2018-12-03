<?php
require_once("Database.php");
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
        #Product:hover #menu{
            display: block;
            position: absolute;
        }
        #Catalog:hover #menu1{
            display: block;
            position: absolute;
        }
    </style>
</head>
<body>


<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">A & K Photo</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                    <li id="Catalog">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu1">
                            <li><a href="catalog.php">Catalog</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="food.php">Food</a></li>
                            <li><a href="pets.php">Pets</a></li>
                            <li><a href="nature.php">Nature</a></li>
                            <li><a href="concerts.php">Concerts</a></li>
                            <li><a href="pineapples.php">Pineapple</a></li>
                            <li><a href="romantic.php">Romantic</a></li>
                        </ul>
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>

                    <li id="Product">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="cameras.php">Products
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu">
                            <li><a href="cameras.php">Cameras & Accessories</a></li>
                            <li><a href="lens.php">Lens</a></li>
                            <li><a href="filters.php">Filters</a></li>
                            <li><a href="tripod.php">Tripods</a></li>
                            <li><a href="memorycard.php">Memory Cards</a></li>
                        </ul>
                    </li>
                    <li><a href="cart.php">Cart</a></li>


                    <?php
                    if (isset($_SESSION["logged_in"])) {
                        echo "<li><a href='account.php'>Account</a></li>";
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li><a href=\"login.php\">Login</a></li>";
                        echo "<li><a href=\"register.php\">Register</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <?php
    if (!empty($_GET["action"])) {
        switch ($_GET["action"]) {
            case "order":

                if (!empty($_SESSION["cart"])) {
                    $query_max = "SELECT MAX(orderID) FROM orders";
                    $max_stmt = $conn->prepare($query_max);
                    $max_stmt->execute();
                    $max_result = $max_stmt->fetch();
                    $orderID = $max_result[0] + 1;
                    $userID = $_SESSION["userID"];
                    $price = 0;
                    foreach ($_SESSION["cart"] as $item) {

                        $productID = $item["productID"];
                        $quantity = $item["quantity"];
                        $price = $item["price"] * $quantity;
                        $now = new DateTime(null, new DateTimeZone("America/New_York"));
                        $date = $now->format('Y-m-d');
                        $gc_query = "SELECT giftcard_balance FROM users WHERE userID=" . $userID;
                        $gc_stmt = $conn->prepare($gc_query);
                        $gc_stmt->execute();
                        $gc_balance = $gc_stmt->fetch();
                        $total_gc_balance = $gc_balance[0] - $price;


                        $query2 = "INSERT INTO orders (orderID, userID, productiD, quantity, price, date) 
                                    VALUES(" . $orderID . ", " . $userID .", " . $productID . ", " . $quantity . ", " . $price . ", " . $date . ")";


                        $user_query = "UPDATE users SET giftcard_balance =" . $total_gc_balance . " WHERE userID=" . $userID;


                        if ($conn->query($query2) === FALSE || $conn->query($user_query) === FALSE) {
                            echo "<div class=\"txt-heading\">There was an error. Your items were not purchased. </div>";
                            break;

                        }
                    }

                }
                unset($_SESSION["cart"]);
                echo "<div class=\"txt-heading\">Thank you! Your order has been placed! </div>";
        }
    } else {
        echo "<div class=\"txt-heading\">There was an error. Your items were not purchased. </div>";
        echo "<div><br/><br/><br/>";
        echo "<div class=\"text-center\">";
        echo "<a href=\"cart.php?action\"";
        echo "class=\"btn-checkout\"><i class=\"fa fa-credit-card\"></i>Place Order</a>";
        echo "</div>";
        echo "</div>";
    }


    ?>


</main>
</body>
<footer class="text-center">
    <br/>
    <br/>
    <br/>
    <small>&copy; Copyright 2018, A&K Photography</small>
</footer>
</html>