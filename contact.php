<?php
require_once("Database.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>A & K Photography</title>
    <link rel="stylesheet" type="text/css" href="bootstrapSuperhero.css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>

        function highlightyellow(x)
        {
            x.style.background="yellow";
        }

        function regular(x)
        {
            x.style.background="white";
        }


    </script>
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
                    <li class="active"><a href="contact.php">Contact</a></li>

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
    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><p>Contact Us</p></div>
                    <div class="panel-body">

                        <form class="form-horizontal" id="contactForm">
                            <fieldset>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" id="inputName" placeholder="Name"
                                               type="text" onfocus="highlightyellow(this)" onblur="regular(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" id="inputEmail" placeholder="Email"
                                               type="text" onfocus="highlightyellow(this)" onblur="regular(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSubject" class="col-sm-2 control-label">Subject</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" id="inputSubject" placeholder="Subject"
                                               type="text" onfocus="highlightyellow(this)" onblur="regular(this)">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-sm-2 control-label">Message</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="3" id="textArea"
                                                  onfocus="highlightyellow(this)" onblur="regular(this)"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group" id="form-id">
                                    <div class="col-sm-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button id ="submitButton" type ="submit"  class="btn btn-primary">Submit</button>
                                        <script>
                                            document.getElementById("submitButton").addEventListener("click", function(){
                                                var names = document.getElementById("contactForm");
                                                var submitName = names.elements["inputName"].value;
                                                alert("Thank you, " + submitName + "! Your message has been sent.");
                                            });

                                        </script>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-lg-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading text-center"><p>General Contact</p></div>
                    <div class="panel-body" style="padding-bottom: 12%">
                        <address style="font-size: larger">
                            <p>Toll Free: 888-123-8888</p>
                            <p>Phone: 269-111-1111</p>
                            <p>Fax: 269-222-2221</p>
                            <p>Email: support@akphotography.com</p>
                        </address>

                        <div style="padding-left: 18%; padding-top: 10%">
                            <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook fa-contact"></a>
                            <a href="https://twitter.com/" target="_blank" class="fa fa-twitter fa-contact"></a>
                            <a href="https://www.google.com/" target="_blank" class="fa fa-google fa-contact"></a>
                            <a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin fa-contact"></a>
                            <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram fa-contact"></a>
                            <a href="https://www.snapchat.com/" target="_blank" class="fa fa-snapchat-ghost fa-contact"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="googleMap" style="height:475px;width:100%;"></div>
                            <script>
                                function myMap() {
                                    var myCenter = new google.maps.LatLng(42.25584, -85.64177);
                                    var mapProp = {
                                        center: myCenter,
                                        zoom: 12,
                                        scrollwheel: false,
                                        draggable: false,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    };
                                    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
                                    var marker = new google.maps.Marker({position: myCenter});
                                    marker.setMap(map);
                                }
                            </script>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChS1wSaaB_NbJB_V4gn6dcunJZwQer-C8&callback=myMap"></script>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
</main>

</body>
<footer class="text-center">
    <small>&copy; Copyright 2018, A&K Photography</small>
</footer>
</html>