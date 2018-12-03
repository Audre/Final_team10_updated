<?php
require_once("Database.php");
session_start();

add_to_cart($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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

                    <li class="active" id="Product">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="cameras.php">Products
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu">
                            <li><a href="cameras.php">Cameras & Accessories</a></li>
                            <li class="active"><a href="lens.php">Lens</a></li>
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
    $query = "SELECT * FROM products WHERE category='lens' ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    if ($num) {
    ?>
    <div class="container-fluid product-alignment" >
        <div class="row">

            <?php
            $row = $stmt->fetch();
            $category = ucfirst($row["category"]);
            echo "<h1 class='text-center content-heading'>" . $category . "</h1>";
            for ($i = 0; $i < $num; $i++) {

                $name = $row["name"];
                echo "<div class='col-lg-10 col-lg-offset-1 col-md-10 col-sm-10 col-xs-12 product-thumbnail '>";
                echo "<h3 class='text-center'>" . $name . "</h3> <br/>";
                echo "<div class=\"col-lg-3 col-lg-offset-1 col-md-4 col-sm-5 col-xs-12 \">";
                echo "<img class=\"product-thumbnail img-responsive\" src=\"images/products/" . $row["imagePath"] . "\"></div>";
                $description = $row["description"];
                echo "<div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12 \">";
                echo "<p class='product-padding'>". $description . "</p><br/>";
                $rating = $row["rating"];
                for ($stars = 0; $stars < $rating; $stars++) {
                    echo "<span class='fa fa-star checked'></span>";
                }
                for ($no_stars = 0; $no_stars < (5 - $rating); $no_stars++) {
                    echo "<span class='fa fa-star unchecked'></span>";
                }
                $storageAmount = $row["unitsInStorage"];
                $price = number_format($row["price"], 2);
                echo "<span><h3>\xf0\x9f\x8d\x8d" . $price . "</h3>";
                echo "<p>Total Items: ". $storageAmount . "</p>";
                $productID = $row["productID"];
                echo "<form action='lens.php?action=add&id=" . $productID . "&quant=' method='POST'>";
                if ($storageAmount == 0) {
                    echo "<span>";
                    echo "<select class='selectContainer' name='quant'>";
                    echo "<option value='' selected>0</option>";
                    echo "</select></span>";
                    echo "<a class='btn bg-danger' name='no_inventory' id='myBtn'><i class='fa fa-shopping-cart'></i> No Inventory</a></span>";
                } else {
                    echo "<span>";
                    echo "<select class='selectContainer' name='quant'>";
                    echo "<option value='1' selected>1</option>";
                    $amount_to_sell = 0;
                    if ($storageAmount > 5) {
                        $amount_to_sell = 5;
                    } else {
                        $amount_to_sell = $storageAmount;
                    }
                    for ($options = 2; $options <= $amount_to_sell; $options++) {
                        echo "<option name='" . $options ."' value='" . $options . "'>" . $options . "</option>";
                    }
                    echo "</select></span>";
                    echo "<button class='btn bg-success btn-text-color' name='submit' type='submit'><i class='fa fa-shopping-cart'></i> Add to Cart</button></span>";
                }
                echo "</form>";
                echo "</div>";
                echo "</div>";
                $row = $stmt->fetch();
            }
            }
            ?>
        </div>
    </div>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">No inventory</h4>
                </div>
                <div class="modal-body">
                    <p>The item has not been added to your cart.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php
    function add_to_cart($conn){
        if (!empty($_GET["action"])) {
            switch ($_GET["action"]) {
                case "add":
                    if (!empty($_POST["quant"])) {
                        $query = "SELECT * FROM products WHERE productID=" . $_GET["id"];
                        $stmt = $conn->prepare($query);
                        $num = $stmt->execute();
                        if ($num) {
                            $quantity = $_POST["quant"];
                            $id = $_GET["id"];
                            $productByCode = $stmt->fetch();
                            $quantity_in_database = $productByCode["unitsInStorage"];
                            if ($quantity > $quantity_in_database) {
                                $ok_to_purchase = False;
                            } else {
                                $quantity_in_database -= $quantity;
                                $update_quantity_query = "UPDATE products SET unitsInStorage=" . $quantity_in_database . " WHERE productID=" . $id;
                                if ($conn->query($update_quantity_query) === TRUE) {
                                }
                                $itemArray = array($productByCode["productID"] => array('quantity' => $quantity, 'image' => $productByCode["thumbnail"], 'price' => $productByCode["price"], 'productID' => $id, 'name' => $productByCode['name']));
                                if (!empty($_SESSION["cart"])) {
                                    if (array_key_exists($id, $_SESSION["cart"])) {
                                        $output = $_SESSION["cart"][$id];
                                        foreach ($_SESSION["cart"] as $key => $value) {
                                            if ($id == $key) {
                                                if (empty($_SESSION["cart"][$key]["quantity"])) {
                                                    $_SESSION["cart"][$key]["quantity"] = 0;
                                                }
                                                $_SESSION["cart"][$key]["quantity"] += $quantity;
                                            }
                                        }
                                    } else {
                                        $_SESSION["cart"] = $_SESSION["cart"] + $itemArray;
                                    }
                                } else {
                                    $_SESSION["cart"] = $itemArray;
                                }
                            }

                        }
                    }
                    break;
            }
        }
        unset($_GET['id']);

    }


    ?>

</main>

<script>
    $(document).ready(function(){
        $(".myBtn").click(function(){
            $("#myModal").modal({backdrop: false });
        });
        $("body").on("click", ".modal-dialog", function(e) {
            if ($(e.target).hasClass('modal-dialog')) {
                var hidePopup = $(e.target.parentElement).attr('id');
                $('#' + hidePopup).modal('hide');
            }
        });


    });

</script>

</body>
<footer class="text-center">
    <small>&copy; Copyright 2018, A&K Photography</small>
</footer>
</html>