<?php
require_once("Database.php");
session_start();
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$error = array();
$first_name = "";
$last_name = "";
$email = "";
function print_errors($error){
    if (count($error) > 0) {
        echo "<div class='error'>";
        foreach ($error as $err) {
            echo $err;
            echo "<br/>";
        }
        echo "</div>";
        echo "<br/>";
    }
}
if (isset($_POST["submit"])) {
    $first_name = $_POST["first_name"];
    $first_name = test_input($first_name);
    $last_name = $_POST["last_name"];
    $last_name = test_input($last_name);
    $email = $_POST["email"];
    $email = test_input($email);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    if (empty($first_name)) {
        array_push($error, "First name is required");
    }
    if (empty($last_name)) {
        array_push($error, "Last name is required");
    }
    if (empty($email)) {
        array_push($error, "Email is required.");
    }
    if (empty($password)) {
        array_push($error, "Password is required");
    }
    if ($password != $password2) {
        array_push($error, "Passwords do not match.");
    }
    $query = "SELECT * FROM users WHERE email='" . $email. "'";
    $stmt = $conn->prepare($query);
    $num = $stmt->execute();
    if ($num) {
        $result = $stmt->fetch();
        if ($result["email"] === $email) {
            array_push($error, "Email is already registered");
        }
        if ($result["first_name"] === $first_name AND $result["last_name"] === $last_name) {
            array_push($error, "User is already registered.");
        }
    }
    if (count($error) == 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO users (first_name, last_name, email, password) 
                  VALUES('$first_name', '$last_name', '$email', '$password')";
        $stmt2 = $conn->prepare($insert_query);
        $result2 = $stmt2->execute();
        if ($result2) {
            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $first_name;
            $_SESSION["last_name"] = $last_name;
            $_SESSION["userID"] = $result2["userID"];
            $_SESSION["giftcard_balance"] = $result2["giftcard_balance"];
            $_SESSION["success"] = "You are now logged in.";
            $_SESSION["logged_in"] = true;
            header('Location: account.php');
        }
    }
}
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
                        echo "<li class='active'><a href=\"register.php\">Register</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Register</h1><br/>
            <form action="register.php" method="POST">
                <?php print_errors($error);?>
                <input required type="text" name="first_name" placeholder="First Name"/>
                <input required type="text" name="last_name" placeholder="Last Name"/>
                <input required type="text" name="email" placeholder="Email"/>
                <input type="password" name="password" placeholder="Password"/>
                <input required type="password" name="password2" placeholder="Confirm Password"/>
                <!--                <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" type="password" name="password" placeholder="Password"/>-->
                <!--                <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" type="password" name="password2" placeholder="Confirm Password"/>-->
                <button type="submit" name="submit" class="center-block btn btn-primary btn-lg">Register</button>
            </form>
        </div>
    </div>





</main>

</body>
<footer class="text-center">
    <small>&copy; Copyright 2018, A&K Photography</small>
</footer>
</html>