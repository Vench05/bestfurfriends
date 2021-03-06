<?php
    include './config/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BestFurFriends</title>
    <link rel="stylesheet" href="./style/main.css">
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/bestfurfriends.png" alt="" title="Bestfurfriends The Dog Shop">
        </div>
        
        <div class="cart">
            <i class="fas fa-shopping-cart"></i> <br /> <br />
<?php 
    if (!isset($_SESSION['username'])) {
        echo '<a href="./php/login.php">login </a>';
    } 
    else {
        $username = $_SESSION['username'];
        $user = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$username'");
        while($product = mysqli_fetch_object($user)) { 
            echo $product->username;
            echo "<a href='./config/logout.php'> log-out</a>";
        }
    }   
?>

        </div>
    </div>

    <div class="navMenu">
        <ul>
            <a href="index.php"><li id="active">Home</li></a>
            <a href="./php/food.php"><li> Food</li></a>
            <a href="./php/treats.php"><li>Treats</li></a>
            <a href="./php/health.php"><li>Health</li></a>
            <a href="./php/grooming.php"><li>Grooming</li></a>
            <a href="./php/crates.php"><li>Crates and Cages</li></a>
            <a href="./php/toys.php"><li>Toys</li></a>
            <a href="./php/accessories.php"><li>Accessories</li></a>
        </ul>
    </div>

    <div class="slideshow">
        <img class="mySlides" src="img/Interface PNG/wallpaper1.png" alt="">
        <img class="mySlides" src="img/Interface PNG/wallpaper2.png" alt="">
        <img class="mySlides" src="img/Interface PNG/wallpaper3.png" alt="">
        <img class="mySlides" src="img/Interface PNG/wallpaper4.png" alt="">
        <img class="mySlides" src="img/Interface PNG/wallpaper5.png" alt="">
    </div>
    <h1 class="shop">SHOP NOW</h1>
    <h4 class="qoute"> The Bestfurfriend sells one of the biggest range of dog food in the Philippines, <br />as well as a huge range of veterenary products and pet accessories. It's everything for dog! </h4>
    <div class="items">
        <div class="item">
            <img src="img/Dog Food/Pedigree Dog Food Puppy 15kg.jpg" alt="">
            <h4 class="name">Pedigree Dog Food Puppy 15kg</h4> <br/>
            <h4 class="price">Php 2100</h4>
            <input type="button" value="Add to Cart" class="add">

        </div>
        <div class="item">
            <img src="img/Grooming/Oral Toothbrush Set Massage Finger Brush and Toothpaste.jpg" alt="">
            <h4 class="name"> Oral Toothbrush Set</h4> <br />
            <h4 class="price">Php 110</h4>
            <input type="button" value="Add to Cart" class="add">
        </div>
        <div class="item">
            <img src="img/Health/Allergy Immune Supplement.jpg" alt="">
            <h4 class="name">Allergy Immune Supplement</h4> <br />
            <h4 class="price">Php 2500</h4>
            <input type="button" value="Add to Cart" class="add">
        </div>
        <div class="item">
            <img src="img/Treats/Jerhigh Bacon Flavor 70g.jpg" alt="">
            <h4 class="name">Jerhigh Bacon Dog Treat 70g</h4> <br />
            <h4 class="price">Php 180</h4>
            <input type="button" value="Add to Cart" class="add">
        </div>
    </div>
 <footer> 
    <div class="footer1">
        <div class="left-foot1">
            <i class="fas fa-phone"></i>
            <h4>(02)-697-3077</h4>
        </div>
        <div class="right-foot1">
            <i class="fas fa-mobile-alt"></i>
            <h4>(0977) 750 6375</h4>
        </div>

    </div>

    <div class="footer2">
        <div class="threecols">
            <div class="col1">
                <h2>ABOUT</h2>
                <a href=""> What we do</a> <br />
                <a href=""> Who we are</a>
            </div>
            <div class="col2">
                <h2>CUSTOMER CARE</h2>
                <a href="">Return Policy</a> <br />
                <a href="">Account</a>
            </div>
            <div class="col3">
                <h2>JOIN THE COMMUNITY</h2>
                <img class="socialmedia" src="img/facebook.png" alt="">
                <img class="socialmedia" src="img/twitter.png" alt="">
                <img class="socialmedia" src="img/insta.png" alt="">
            </div>
        </div>
    </div>
 <footer> 
        <script src="./js/main.js"></script>
</body>
</html>