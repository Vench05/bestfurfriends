<?php 
    $conn = mysqli_connect("localhost", "root", "", "dbbestfurfriends");

    $result = mysqli_query($conn, "SELECT * FROM tbproduct WHERE category = 'food'")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BestFurFriends</title>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="../img/bestfurfriends.png" alt="" title="Bestfurfriends The Dog Shop">
    </div>

    <form action="food.php" method="POST">
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
            while($product = mysqli_fetch_object($result)) {
                ?>
            <div class="item">
            <img src="<?php echo $product->image ?>">
            <h4 class"name"> <?php echo $product->name ?> </h4> <br />
            <h4 class="price"><?php echo $product->price ?> </h4>
            <input type="button" value="Add to Cart" class="add">
            <button class="add" id="<?php echo $product->id ?>"
            type="button" data-toggle="modal" data-target="#myModal" 
            onclick="showDetails(this);">Details</button>
    </div>
    <?php } ?>
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

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p><span id="name"></span></p>
          <p><span> asdasd</span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
            <!-- end modal -->
    <script>
        function showDetails(button) {
        const id = button.id;
        console.log(id);
        
        // ajax to call specific id
        $.ajax({
        url: './detail.php',
        method: 'GET',
        data: {"id": id},
        success: function(response) {
            // parsing the json string to js object
            var product = JSON.parse(response);
            // display in proper fields
            $("#name").text(product.name);
        }
    });
}
    </script>
</body>
</html>