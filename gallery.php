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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
                    <li class="active" id="Catalog">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="catalog.php">Catalog
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu1">
                            <li><a href="catalog.php">Catalog</a></li>
                            <li class="active"><a href="gallery.php">Gallery</a></li>
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



    <div class="container-fluid" style="padding-left: 5%">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/luke.jpg" alt="luke" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/cole.jpg" alt="cole">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/luke2.jpg" alt="luke2">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/concert1.jpg" alt="concert1" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/concert2.jpg"  alt="concert2">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/concert3.jpg" alt="concert3">
            </div>


            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/food1.jpg" alt="food1" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/food2.jpg" alt="food2">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/donuts.jpg" alt="donuts">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/cupcakes.jpg" alt="cupcakes" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/drink.JPG"  alt="drink ">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/cake.jpg" alt="cake">
            </div>


            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/water.jpg" alt="water" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/yellowflowers.jpg" alt="yellowflowers">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/sunset.jpg" alt="sunset">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/butterfly.jpg" alt="butterfly" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/ring.jpg"  alt="ring">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/pink.jpg" alt="pink">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/sophie19.jpg" alt="sophie19" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/sophie2.jpg" alt="sophie2">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/sophie1.jpg" alt="sophie1">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/sophie16.jpg" alt="sophie16" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/sophie17.jpg"  alt="sophie17">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/sophie18.jpg" alt="sophie18">
            </div>


            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/kitty.jpg" alt="kitty" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                <img class="myImg img-thumbnail" src="images/kitty1.jpg" alt="sophie17">
            </div>


            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/pineapple2.jpg" alt="pineapple2" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/coolpine.jpg" alt="coolpine">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/pineapple4.jpg" alt="pineapple4">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/pineapple5.jpg" alt="pineapple5">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/palmtree.jpg"  alt="palmtree">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/colorfulpineapple.jpg" alt="colorfulpineapple">
            </div>


            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/romantic.jpg" alt="romantic" >
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/romantic1.jpg" alt="romantic1">
            </div>

            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 ">
                <img class="myImg img-thumbnail" src="images/romantic3.jpg" alt="romantic3">
            </div>

            <div class="col-lg-4 col-md-4 c col-sm-5 col-xs-12 ">
                <img class = "img-thumbnail myImg" src="images/romantic2.jpg" alt="romantic2" >
            </div>

        </div>
    </div>

    <div id="myModal" class="modal" onclick="this.style.display='none'">
        <span class="close">&times;</span>
        <img src='' class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

</main>
<script>

    var modal = document.getElementById("myModal");

    var img = $(".myImg");
    var modalImg = $("#img01");
    img.click(function () {
        modal.style.display = "block";
        var newSrc = this.src;
        modalImg.attr("src", newSrc);
    });

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function () {
        modal.style.display = "none";

    };

</script>


</body>
<footer class="text-center">
    <small>&copy; Copyright 2018, A&K Photography</small>
</footer>
</html>