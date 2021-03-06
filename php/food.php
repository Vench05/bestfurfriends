<?php 
    include '../config/db.php';

    $result = mysqli_query($conn, "SELECT * FROM tbproduct WHERE category = 'food'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BestFurFriends</title>
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<div class="header">
    <div class="logo">
        <img src="../img/bestfurfriends.png" alt="" title="Bestfurfriends The Dog Shop">
    </div>

    <form action="food.php" method="POST">
        <div class="input">
            <input class="search-bar" autocomplete="off" type="search" name="search" placeholder="Search..." value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>" >
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    
    <div class="cart">
        <i class="fas fa-shopping-cart"></i> <br /> <br />
        <?php 
    if (!isset($_SESSION['username'])) {
        echo '<a href="./login.php">login </a>';
    } 
    else {
        $username = $_SESSION['username'];
        $user = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$username'");
        while($product = mysqli_fetch_object($user)) { 
            echo $product->username;
            echo "<a href='../config/logout.php'> log-out</a>";
        }
    }   
?>
    </div>
</div>

<div class="navMenu">
    <ul>
        <a href="../index.php"><li>Home</li></a>
        <a href="food.php"><li id="active"> Food</li></a>
        <a href="treats.php"><li>Treats</li></a>
        <a href="health.php"><li>Health</li></a>
        <a href="grooming.php"><li>Grooming</li></a>
        <a href="crates.php"><li>Crates and Cages</li></a>
        <a href="toys.php"><li>Toys</li></a>
        <a href="accessories.php"><li>Accessories</li></a>
    </ul>
</div>

<div class="items">

<?php 
    if (isset($_POST['search'])) {
        $searchInput = $_POST['search'];
        $result = mysqli_query($conn, "SELECT * FROM tbproduct WHERE category = 'food' and name LIKE '%$searchInput%'");
        
        if ($result->num_rows > 0) {
            while($product = mysqli_fetch_object($result)) {
                ?>
            <div class="item">
                <img src="<?php echo $product->image ?>">
                <h4 class="name"> <?php echo $product->name ?> </h4> <br />
                <h4 class="price">&#8369;<?php echo $product->price ?> </h4>
    
            <button class="add" id="<?php echo $product->id ?>"
            onclick="document.getElementById('id01').style.display='block'; showDetails(this);"
            class="w3-button">Details</button>
        </div>
    <?php } ?> <?php
        }
        else {
            echo "<div style='color: red; height: 380px; font-size: 1.5rem;'><br><br> 
            <i class='em em-anguished'></i>
            <br><br><br> 
            No Result Found</div>";
        }
    }

    else {
        while($product = mysqli_fetch_object($result)) {
            ?>
        <div class="item" >
            <img src="<?php echo $product->image ?>"
            >
            <h4 class="name"> <?php echo $product->name ?> </h4> <br />
            <h4 class="price">&#8369;<?php echo $product->price ?> </h4>

            <button class="add" id="<?php echo $product->id ?>"
            onclick="document.getElementById('id01').style.display='block'; showDetails(this);"
            class="w3-button">Details</button>
        </div>
<?php } 
    }
?>

            
</div>   

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
    
<!-- Modal content-->      
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">

            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('id01').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h2><span id="name"></span></h2>
            </header>

            <div class="w3-container">
                <div class="image">
                    <img src="" id="image">
                </div>
                <div class="details">
                    <span id="name2"></span>
                    <p id="description"></p>
                    <hr>
                    <p class="pricing">&#8369;&nbsp;<span id="price"></span></p>
                    <div id="field1">
                        <button type="button" id="sub" class="minus">-</button>
                        <input type="number" id="1" min = "0" value="0" class="field"/>
                        <button type="button" id="add" class="plus">+</button>
                    </div>
                </div>
            </div>

            <footer class="w3-container w3-teal">
                <form action="../config/add-to-cart.php" method="POST">
                    <input type="hidden" name="name" id="nameCart" value="">
                    <input type="hidden" name="price" id="priceCart" value="">
                    <input type="hidden" name="image" id="imgCart" value="">
                    <input type="hidden" name="user_id" value="<?php 
                    $username = $_SESSION['username'];
                    $user = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$username'");
                    while($product = mysqli_fetch_object($user)) { 
                        echo $product->username;
                    }
                    ?>">
                    <input type="submit" value="Add to Cart" class="add1">
                </form>
            </footer>
        </div>
    </div>
<!-- end modal -->
    <script src="../js/modal.js"></script>
    <script src="../js/image-preview.js"></script>
</body>
</html>