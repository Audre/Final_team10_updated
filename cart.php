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
                    <li class="active"><a href="cart.php">Cart</a></li>


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
            case "empty":
                foreach ($_SESSION["cart"] as $item) {
                    $productID = $item["productID"];
                    $quantity_to_add_back = $item["quantity"];
                    $product_query = "SELECT unitsInStorage FROM products WHERE productID=" . $item["productID"];
                    $product_stmt = $conn->prepare($product_query);
                    $product_stmt->execute();
                    $product_result = $product_stmt->fetch();

                    $updated_quantity_amount = $quantity_to_add_back += $product_result[0];

                    $quantity_update = "UPDATE products SET unitsInStorage=" . $updated_quantity_amount .
                                    " WHERE productID=" . $item["productID"];

                    $conn->query($quantity_update);


                }
                unset($_SESSION["cart"]);
                break;
            case "remove":
                if (!empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $k => $v) {
                        if ($_GET["id"] == $k) {
                            $productID = $k;
                            $quantity_to_add_back = $v["quantity"];
                            $product_query = "SELECT unitsInStorage FROM products WHERE productID=" . $productID;
                            $product_stmt = $conn->prepare($product_query);
                            $product_stmt->execute();
                            $product_result = $product_stmt->fetch();

                            $updated_quantity_amount = $quantity_to_add_back += $product_result[0];

                            $quantity_update = "UPDATE products SET unitsInStorage=" . $updated_quantity_amount .
                                " WHERE productID=" . $productID;

                            $conn->query($quantity_update);
                            unset($_SESSION["cart"][$k]);

                        }

                        if (empty($_SESSION["cart"])){
                            unset($_SESSION["cart"]);
                        }

                    }
                }
                break;
        }
    }
    echo "<div id=\"shopping-cart\">";
    echo "<div class=\"txt-heading\">Shopping Cart</div>";
    echo "<a id=\"btnEmpty\" href=\"cart.php?action=empty\">Empty Cart</a>";
    if (isset($_SESSION["cart"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:center;">Name</th>
                <th style="text-align:left;">Product ID</th>
                <th style="text-align:center;" width="5%">Quantity</th>
                <th style="text-align:center;" width="10%">Unit Price</th>
                <th style="text-align:center;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                ?>
                <tr>
                    <td><img src="images/products/<?php echo $item["image"]; ?>" class="cart-item-image"/><?php echo $item["name"]; ?>
                    </td>
                    <td><?php echo $item["productID"]; ?></td>
                    <td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:center;"><?php echo "\xf0\x9f\x8d\x8d " . $item["price"]; ?></td>
                    <td style="text-align:center;"><?php echo "\xf0\x9f\x8d\x8d " . number_format($item_price, 2); ?></td>
                    <td style="text-align:center;"><a href="cart.php?action=remove&id=<?php echo $item["productID"]; ?>"
                                                      class="btn btn-checkout"><i class="fa fa-trash"></i> Remove</a></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"] * $item["quantity"]);
            }
            ?>
            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "\xf0\x9f\x8d\x8d " . number_format($total_price, 2); ?></strong></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <br/>
        <div class="text-center">
            <form action='cart.php?action=checkout' method='POST'>
                <a href="confirm.php" class='btn-checkout btn-primary' name='submit' type='submit'><i class='fa fa-credit-card'></i> Checkout</a>
            </form>
        </div>
        <?php
    } else {
        echo "<div class=\"no-records\">Your Cart is Empty</div>";
    }
    ?>
</main>
</body>
<footer class="text-center">
    <small>&copy; Copyright 2018, A&K Photography</small>
</footer>
</html>