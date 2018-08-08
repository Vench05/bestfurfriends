<?php 
    $conn = mysqli_connect("localhost", "root", "", "dbbestfurfriends");

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
            <input type="search" name="" id="" 
            placeholder="search">
            <input type="submit" value="Search" class="search-product" autocomplete="off">
        </div>
        
    </header>

    <div class="product-container">
        <div class="title">Update, Delete</div>
        <div class="title">Name</div>
        <div class="title">Image</div>
        <div class="title">Price</div>
        <div class="title">Quantity</div>
        <div class="title">Category</div>
        <div class="title">Description</div>
        <?php
        while($product = mysqli_fetch_object($result)) {
                ?>
                <div> update/ delete </div>
                <h4 > <?php echo $product->name ?> </h4>
                <img src="<?php echo $product->image ?>">
                <h4>&#8369;<?php echo $product->price ?> </h4>
                <h4 > <?php echo $product->quantity ?> </h4>
                <h4 > <?php echo $product->category ?> </h4>
                <h4 > <?php echo $product->description ?> </h4>
    <?php } ?>
    </div>

    <!-- Modal content-->      
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content">

            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('id01').style.display='none'" 
                class="w3-button w3-display-topright">&times;</span>
                <h1>Add New Product</h1>
            </header>
            
            <form action="">
            <div class="modal-add-container">
                
                <div class="add-container-left">
                    <h3>Product Name:</h3>
                    <input type="text" name="name" id="" placeholder="Name" autocomplete="off">
                    <h3>Product Price:</h3>
                    <input type="text" name="price" id="" placeholder="Price" autocomplete="off">
                    <h3>Product Quantity:</h3>
                    <input type="text" name="quantity" id="" placeholder="Quantity" autocomplete="off">
                    <h3>Product Category:</h3>
                    <input type="text" name="category" id="" placeholder="Category" autocomplete="off">
                    <h3>Product Description:</h3>
                    <textarea name="description" id="" cols="40" rows="8"></textarea>
                </div>
                <div class="add-container-right">
                    Insert Product Image:
                    <input type="file" id="imgInp" name="pic" accept="image/*">
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
    <script src="../js/modal.js"></script>
</body>
</html>