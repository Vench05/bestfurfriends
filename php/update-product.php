<?php 
    include '../config/db.php';

    $id = $_POST['id'];
    $category = $_POST['category'];
    $result = mysqli_query($conn, "SELECT * FROM tbproduct WHERE id ='$id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Product</title>
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body> 
    <form action="../config/update.php" enctype="multipart/form-data" method="post" id="update-form" onsubmit="return confirm('Are you sure you want to delete this product?')">
        <div class="update-container">
        <?php
        while($product = mysqli_fetch_object($result)) { 
        ?>
            <div class="update-left">
                <input type="hidden" name="id" value="<?php echo $product->id ?>">
                <h3>Product Name:</h3>
                <input type="text" name="name" id="" placeholder="Name" autocomplete="off" required value="<?php echo $product->name ?>">
                <h3>Product Price:</h3>
                <input type="text" name="price" id="" placeholder="Price" autocomplete="off" required value="<?php echo $product->price ?>">
                <h3>Product Quantity:</h3>
                <input type="text" name="quantity" id="" placeholder="Quantity" autocomplete="off" required value="<?php echo $product->quantity ?>">
                <h3>Product Category:</h3>
                <select name="category" id="">

                    <option value="food"
                        <?php 
                            if(strtolower($category) == 'food') {
                                echo 'selected';
                            } 
                        ?>
                        >   Food
                    </option>

                    <option value="treats"
                        <?php 
                                if(strtolower($category) == 'treats') {
                                    echo 'selected';
                                } 
                        ?>
                        > Treats
                    </option>

                    <option value="health"
                        <?php 
                            if(strtolower($category) == 'health') {
                                echo 'selected';
                            } 
                        ?>
                        >Health
                    </option>

                    <option value="groom"
                        <?php 
                            if(strtolower($category) == 'groom') {
                                echo 'selected';
                            } 
                        ?>
                        >Grooming
                    </option>

                    <option value="crates"
                        <?php 
                            if(strtolower($category) == 'crates') {
                                echo 'selected';
                            } 
                        ?>  
                        >Crates
                    </option>

                    <option value="toys"
                        <?php 
                            if(strtolower($category) == 'toys') {
                                echo 'selected';
                            } 
                        ?>
                        >Toys
                    </option>

                    <option value="accessories"
                        <?php 
                            if(strtolower($category) == 'accessories') {
                                echo 'selected';
                            } 
                        ?>
                        >Accessories
                    </option>

                </select>
                <h3>Product Description:</h3>
                <textarea class="description" name="description" id="" cols="60" rows="60" required><?php echo $product->description ?></textarea>
            </div>

            <div class="update-right">
                <h3>Product Image: </h3>
                <img id="blah" src="<?php echo $product->image ?>"/>
                <input type="file" name="product-img" id="imgInp" accept=".jpg, .jpeg, .png" style="width: 100px;"> 
            </div>
            
            <?php } ?>

            <footer class="update-footer" id="admin-footer" >
                <input type="submit" value="Update Product" name="update" >
            </footer>
        </div>
    </form>
    <script src="../js/update.js"></script>
</body>
</html>