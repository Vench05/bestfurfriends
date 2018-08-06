<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BestFurFriends</title>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="../img/bestfurfriends.png" alt="" title="Bestfurfriends The Dog Shop">
    </div>

    <form action="treats.php" method="POST">
        <div class="input">
            <input class="search-bar" type="search" name="search" placeholder="Search..." value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>" >
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    
    <div class="cart">
        <i class="fas fa-shopping-cart"></i> <br /> <br />
        <a href="">Account</a>
    </div>
</div>

<div class="navMenu">
    <ul>
        <a href="../index.html"><li>Home</li></a>
        <a href="food.php"><li> Food</li></a>
        <a href="treats.php"><li id="active">Treats</li></a>
        <a href="health.php"><li>Health</li></a>
        <a href="grooming.php"><li>Grooming</li></a>
        <a href="crates.php"><li>Crates and Cages</li></a>
        <a href="toys.php"><li>Toys</li></a>
        <a href="accessories.php"><li>Accessories</li></a>
    </ul>
</div>

<div class="items">
<?php 
    $mysqli = new mysqli("localhost", "root", "", "dbbestfurfriends");

    if (isset($_POST['search'])) {
        $searchq = $_POST['search'];

        $sql = ("SELECT * FROM tbproduct WHERE name LIKE '%$searchq%' and category = 'treats'") or die();
        
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_array($result)) {
                ?>
            <div class="item">
            <img src="<?php echo $row["image"] ?>">
            <h4 class"name"> <?php echo $row["name"]; ?> </h4>
            <h4 class="price"><?php echo $row["price"]; ?> </h4>
            <input type="button" value="Add to Cart" class="add">
    </div>
            <?php   
            }
        }
        else {
            
            echo "<div class='no-result'>No Search Result </div>";
        }
    }
    else {
    $sql = "SELECT * FROM tbproduct WHERE category = 'treats'";
    $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
            while($row = mysqli_fetch_array($result)){
    ?>
    <div class="item">
            <img src="<?php echo $row["image"] ?>">
            <h4 class"name"> <?php echo $row["name"]; ?> </h4>
            <h4 class="price"><?php echo $row["price"]; ?> </h4>
            <input type="button" value="Add to Cart" class="add">
    </div>
    <?php
            }
        }
    }
?>
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
                <img class="socialmedia" src="../img/facebook.png" alt="">
                <img class="socialmedia" src="../img/twitter.png" alt="">
                <img class="socialmedia" src="../img/insta.png" alt="">
            </div>
        </div>
    </div>
</footer>
    <script src="./js/main.js"></script>
</body>
</html>