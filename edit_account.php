<?php
require_once("Database.php");
session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
}
//else {
//    $gc_query = "SELECT giftcard_balance FROM users WHERE userID=" . $_SESSION["userID"];
//    $gc_stmt = $conn->prepare($gc_query);
//    $gc_stmt->execute();
//    $gc_balance = $gc_stmt->fetch();
//
//    $_SESSION["giftcard_balance"] = $gc_balance[0];
//}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <link rel="stylesheet" type="text/css" href="accountStyle.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #Product:hover #menu {
            display: block;
            position: absolute;
        }

        #Catalog:hover #menu1 {
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
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
                        echo "<li class='active'><a href='account.php'>Account</a></li>";
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
    if ($_SESSION["first_name"] == "admin") {

    ?>

    <div class="w3-content w3-margin-top" style="max-width:1400px;">

        <!-- The Grid -->
        <div class="w3-row-padding">

            <!-- Left Column -->
            <div class="w3-third">

                <div class="w3-white w3-text-grey w3-card-4">
                    <div class="w3-display-container">
                        <img src="images/blank-profile-picture.png" style="width:100%" alt="Avatar">
                        <div class="w3-display-bottomleft w3-container w3-text-black">
                            <h2><?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?></h2>
                        </div>
                    </div>
                    <div class="w3-container">
                        <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            <?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Michigan</p>
                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            <?php echo $_SESSION["email"]; ?></p>
                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>122-333-4444</p>
                        <p><i class="fa fa-gift fa-fw w3-margin-right w3-large w3-text-teal"></i>
                            <?php echo $_SESSION["giftcard_balance"]; ?></p>
                        <hr>
                    </div>
                </div>
                <br>

                <!-- End Left Column -->
            </div>


            <!-- Right Column -->
            <div class="w3-twothird">
                <div class="w3-container w3-card w3-white w3-margin-bottom">
                    <h2 class="w3-text-grey w3-padding-16"><i
                            class="fa fa-credit-card fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Orders</h2>

                    <?php
                    $user_query = "SELECT DISTINCT userID FROM orders";
                    $sql = $conn->prepare($user_query);
                    $sql->execute();
                    $users = $sql->fetchAll();
                    //$user_ids = [];
                    foreach ($users as $user) {
                        $query = "SELECT DISTINCT orderID FROM orders WHERE userID=" . $user["userID"];
                        $stmt = $conn->prepare($query);
                        $stmt->execute();
                        $num = $stmt->rowCount();
                        if ($num) {
                            for ($i = 0; $i < $num; $i++) {
                                $result = $stmt->fetchAll();
                                foreach ($result as $order) {
                                    $user_id_query = "SELECT * FROM users WHERE userID=" . $user["userID"];
                                    $user_stmt = $conn->prepare($user_id_query);
                                    $user_stmt->execute();
                                    $user_result = $user_stmt->fetch();
                                    echo "<div class=\"w3-container\">";
                                    echo "<h5 class=\"w3-opacity\"><b>Order Number: " . $order[0] . "</b></h5>";
                                    echo "<h5 class=\"w3-opacity\"><b>Name: " . $user_result["first_name"] . " " . $user_result["last_name"] . "</b></h5>";
                                    echo "<h6 class=\"w3-text-teal\"><i class=\"fa fa-calendar fa-fw w3-margin-right\">";

                                    $query2 = "SELECT * FROM orders WHERE orderID=" . $order[$i];
                                    $stmt2 = $conn->prepare($query2);
                                    $stmt2->execute();
                                    $orders = $stmt2->fetchAll();
                                    $products = [];
                                    $quantity = [];
                                    $price = [];
                                    $date = $orders[0]["date"];
                                    $total_cost = 0;
                                    //print_r($orders);
                                    echo "<br/>";
                                    echo "</i>" . $date . "<span class=\"w3-tag w3-teal w3-round\"></span></h6>";

                                    foreach ($orders as $item) {
                                        $total_order = array($item["productID"], $item["quantity"], $item["price"]);

                                        array_push($products, $item["productID"]);
                                        array_push($quantity, $item["quantity"]);
                                        array_push($price, $item["price"]);


                                        for ($j = 0; $j < count($products); $j++) {
                                            $query3 = "SELECT * FROM products WHERE productID=" . $total_order[0];
                                            $stmt3 = $conn->prepare($query3);
                                            $stmt3->execute();
                                            $product_info = $stmt3->fetch();
                                            echo "<div class='row'>";
                                            echo "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 w3-opacity account-item' >Item: " . $product_info["name"] . "</div></div>";

                                        }
                                        echo "<div class='row'>";
                                        echo "<div class='col-lg-offset-1 col-lg-4 col-md-4 col-sm-4 col-xs-12 w3-opacity'>Quantity: " . $item["quantity"] . "</div>";
                                        echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12 w3-opacity'>Price: " . $item["price"] . "</div>";
                                        echo "</div>";
                                        echo "<br/>";
                                        $total_cost += $item["price"];

                                        $products = [];
                                    }
                                    echo "<p class='account-total w3-opacity'>Total Price: " . $total_cost . "</p>";
                                    echo "<hr>";
                                    echo "</div>";
                                }
                            }
                            echo "</div>";

                        } else {
                            echo "<div class=\"w3-container\">";
                            echo "<h5 class=\"w3-opacity\"><b>No Orders</b></h5>";
                            echo "<hr>";
                            echo "</div>";
                            echo "</div>";

                        }

                    }
                    echo "<div class=\"w3-container w3-card w3-white w3-margin-bottom\">";
                    echo "<h2 class=\"w3-text-grey w3-padding-16\"><i class=\"fa fa-credit-card fa-fw w3-margin-right w3-xxlarge w3-text-teal\"></i>Inventory</h2>";

                    $inventory_query = "SELECT * FROM products";
                    $inventory_stmt = $conn->prepare($inventory_query);
                    $inventory_stmt->execute();
                    $inventory = $inventory_stmt->fetchAll();
                    foreach ($inventory as $item) {
                        echo "<div class=\"w3-container\">";
                        echo "<h5 class=\"w3-opacity\"><b>Item: " . $item["name"] . "</b></h5>";
                        if ($item["unitsInStorage"] < 5) {
                            echo "<p class='text-danger low-inventory'>Items in Storage: " . $item["unitsInStorage"] . "</p>";
                            echo "<a class='btn btn-danger myBtn' name='add_amount' id='" . $item["productID"] . "'>Add Inventory</a>";
                        } else {
                            echo "<p>Items in Storage: " . $item["unitsInStorage"] . "</p>";
                        }

                        echo "<hr>";
                        echo "</div>";

                    }


                    echo "</div>";

                    echo "</div>";


                    } else {


                    ?>

                    <!-- Page Container -->
                    <div class="w3-content w3-margin-top" style="max-width:1400px;">

                        <!-- The Grid -->
                        <div class="w3-row-padding">

                            <!-- Left Column -->
                            <div class="w3-third">

                                <div class="w3-white w3-text-grey w3-card-4">
                                    <div class="text-center text-primary"><a href="edit_account.php"> Edit Account
                                            Info </a></div>
                                    <div class="w3-display-container">
                                        <img src="images/blank-profile-picture.png" style="width:100%" alt="Avatar">
                                        <div class="w3-display-bottomleft w3-container w3-text-black">
                                            <h2><?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?></h2>

                                        </div>
                                    </div>
                                    <div class="w3-container">
                                        <p><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                            <?php echo $_SESSION["first_name"] . " " . $_SESSION["last_name"]; ?></p>
                                        <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Michigan</p>
                                        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                            <?php echo $_SESSION["email"]; ?></p>
                                        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>122-333-4444</p>
                                        <p><i class="fa fa-gift fa-fw w3-margin-right w3-large w3-text-teal"></i>
                                            <?php echo $_SESSION["giftcard_balance"]; ?></p>
                                        <hr>
                                    </div>


                                </div>
                                <br>

                                <!-- End Left Column -->
                            </div>

                            <!-- Right Column -->
                            <div class="w3-twothird">
                                <div class="w3-container w3-card w3-white w3-margin-bottom">

                                    <?php
                                    echo "<div class=\"modal-dialog\">";
                                    echo "<div class=\"loginmodal-container\">";
                                    echo "<h1>Update Account Info</h1><br/>";
                                    echo "<form action=\"edit_account.php\" method=\"POST\">";
                                    echo "<input type=\"text\" name=\"first_name\" placeholder=\"First Name\"/>";
                                    echo "<input type=\"text\" name=\"last_name\" placeholder=\"Last Name\"/>";
                                    echo "<input type=\"text\" name=\"address\" placeholder=\"Address\"/>";
                                    echo "<input type=\"text\" name=\"number\" placeholder=\"Phone Number\"/>";
                                    echo "<input type=\"text\" name=\"email\" placeholder=\"Email\"/>";
                                    echo "<input required type=\"password\" pattern=\"(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}\" name=\"password\" placeholder=\"Password\"/>";
                                    echo "<input required type=\"password\" pattern=\"(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}\" name=\"password2\" placeholder=\"Confirm Password\"/>";
                                    echo "<button type=\"submit\" name=\"submit\" class=\"center-block btn btn-primary btn-lg\">Update</button>";
                                    echo "</form>";
                                    echo "</div>";
                                    echo "</div>";


                                    }

                                    ?>

                                </div>

                                <!-- End Right Column -->
                            </div>

                            <!-- End Grid -->
                        </div>

                        <!-- End Page Container -->
                    </div>

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add to Inventory</h4>
                                </div>
                                <div class="modal-body">
                                    <br/>
                                    <form method="post" id="insert_form">
                                        <label for="product">Product ID: <input id="productID" name="productID"
                                                                                type="number" max="5"/></label>
                                        <label for="amount">Amount: <input id="unitsInStorage" type="number"
                                                                           name="unitsInStorage"/> </label>

                                        <button type="submit" id="add" name="add_to_inventory" value=""
                                                class="btn btn-checkout">Add to Inventory
                                        </button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="close">
                                        Close
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>


</main>
<script>
    $(document).ready(function () {
        $(".myBtn").click(function () {
            $("#myModal").modal({backdrop: false});
        });
        $("body").on("click", ".modal-dialog", function (e) {
            if ($(e.target).hasClass('modal-dialog')) {
                var hidePopup = $(e.target.parentElement).attr('id');
                $('#' + hidePopup).modal('hide');
            }
        });

        $(document).on('submit', '#insert_form', function (e) {
            var data = $("#productID").serialize();
            var data2 = $("#unitsInStorage").serialize();

            $.ajax({
                data: {data, data2},
                type: "post",
                url: "add_inventory.php",
                success: function (data, data2) {
                    alert("Data: " + data, data2);
                }
            });
        });

        $(document).on('click', "#1", function () {
            $("#productID").val("1");
        });

        $(document).on('click', "#2", function () {
            $("#productID").val("2");
        });

        $(document).on('click', "#3", function () {
            $("#productID").val("3");
        });

        $(document).on('click', "#4", function () {
            $("#productID").val("4");
        });

        $(document).on('click', "#5", function () {
            $("#productID").val("5");
        });

        $(document).on('submit', "#insert_form", function () {
            location.reload();

        });


    });

</script>


</body>
</html>