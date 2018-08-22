<?php 
    include '../config/db.php';

    $result = mysqli_query($conn, "SELECT * FROM tbproduct");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>    
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
        <h1> Admin</h1>
    </div>
    
    <header class="product-header">
        <button class="add-new-product"
        
        onclick="document.getElementById('id01').style.display='block'">
            Add New Product
        </button>
        <div class="admin-search">
        <form action="admin-page.php" method="POST">
            <input autocomplete="off" type="search" name="search" placeholder="Search..." value="<?php if(isset($_POST['search'])) {echo $_POST['search'];} ?>" >
            <button type="submit"><i class="fas fa-search"></i></button>
    </form>
        </div>
        
    </header>

    <div class="product-container">
        <div class="title"> Option </div>
        <div class="title">Name</div>
        <div class="title">Image</div>
        <div class="title">Price</div>
        <div class="title">Quantity</div>
        <div class="title">Category</div>
        <div class="title">Description</div>
    </div>

<?php 
    if (isset($_POST['search'])) {
            $searchInput = $_POST['search'];
            $result = mysqli_query($conn, "SELECT * FROM tbproduct WHERE category LIKE '%$searchInput%' OR name LIKE '%$searchInput%'");
            
            if ($result->num_rows > 0) {
                while($product = mysqli_fetch_object($result)) {
                    ?>
             <div class="product-container">       
                <div class="product-list"> 
                    <form action="../config/delete.php" method="post">
                        <input type="hidden" value="<?php echo $product->id ?>" name="id"> 
                        <input type="submit" value="Delete" name="delete">
                    </form>
                    <form action="" method="post"></form>
                </div>
                <h4 class="product-list"> <?php echo $product->name ?> </h4>
                <img  class="product-list" src="<?php echo $product->image ?>">
                <h4 class="product-list">&#8369;<?php echo $product->price ?> </h4>
                <h4 class="product-list"> <?php echo $product->quantity ?> </h4>
                <h4 class="product-list" > <?php echo $product->category ?> </h4>
                <h4 class="product-list" style="text-align: justify;"> <?php echo $product->description ?> </h4>
            </div>
        <?php } ?> <?php
            }
            else {
                echo "<div style='color: red; height: 380px; font-size: 1.5rem; text-align:center;'><br><br> <i class='em em-anguished'></i><br> <br><br> No Result Found</div>";
            }
        }
    else {
        while($product = mysqli_fetch_object($result)) {
            ?>
        <div class="product-container">
            <div class="product-list">
                <form action="update-product.php" method="post">
                    <input type="hidden" value="<?php echo $product->id ?>" name="id"> 
                    <input type="hidden" value="<?php echo $product->category ?>" name="category"> 
                    <input type="submit" value="Update" name="delete">
                </form>
                <form action="../config/delete.php" method="post" onsubmit="return confirm('Are you sure you want to delete this product?')">
                        <input type="hidden" value="<?php echo $product->id ?>" name="id"> 
                        <input type="submit" value="Delete" name="delete">
                </form>
            </div>
            <h4 class="product-list"> <?php echo $product->name ?> </h4>
            <img  class="product-list" src="<?php echo $product->image ?>">
            <h4 class="product-list">&#8369;<?php echo $product->price ?> </h4>
            <h4 class="product-list"> <?php echo $product->quantity ?> </h4>
            <h4 class="product-list" > <?php echo $product->category ?> </h4>
            <h4 class="product-list" style="text-align: justify;"> <?php echo $product->description ?> </h4>
        </div>
    <?php }} ?>
    </div>

    <!-- Modal content-->      
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">

            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('id01').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h1>Add New Product</h1>
            </header>
            
            <form action="../config/add-new-product.php" method="POST" enctype="multipart/form-data">

            <div class="modal-add-container">
                
                <div class="add-container-left">
                    <h3>Product Name:</h3>
                    <input type="text" name="name" id="" placeholder="Name" autocomplete="off" required>
                    <h3>Product Price:</h3>
                    <input type="number" name="price" min="0" id="" placeholder="Price" autocomplete="off" required>
                    <h3>Product Quantity:</h3>
                    <input type="number" name="quantity" min="0" id="" placeholder="Quantity" autocomplete="off" required>
                    <h3>Product Category:</h3>
                    <select name="category" >
                        <option value="food">Food</option>
                        <option value="treats">Treats</option>
                        <option value="health">Health</option>
                        <option value="groom">Grooming</option>
                        <option value="crates">Crates</option>
                        <option value="toys">Toys</option>
                        <option value="accessories">Accessories</option>
                    </select>
                    <h3>Product Description:</h3>
                    <textarea class="description" name="description" id="" cols="60" rows="60" required></textarea>
                </div>

                <div class="add-container-right">
                    <h3>Insert Product Image: </h3>
                    <input type="file" name="product-img" id="imgInp" accept=".jpg, .jpeg, .png">
                    <img id="blah" src=""/>
                </div>
            </div>

            <footer class="w3-container w3-teal" id="admin-footer">
                <input type="submit" value="Add Product">
                <input type="reset" value="Reset" id="reset">
            </footer>
            
            </form>
        </div>
    </div>
<!-- end modal -->
    <script src="../js/image-preview.js"></script>
</body>
</html>