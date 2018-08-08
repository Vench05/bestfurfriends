<?php 
    $conn = mysqli_connect("localhost", "root", "", "dbbestfurfriends");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $category = $_POST['category'];
        $description = addslashes($_POST['description']);
        $imagePath = "../img/product/".$_FILES['product-img']['name'];

        if (copy($_FILES['product-img']['tmp_name'], $imagePath)) {
            $result = mysqli_query($conn, "INSERT INTO tbproduct (name, price, quantity, category, description, image) 
            VALUES ('$name', '$price', '$quantity', '$category', '$description', '$imagePath')");
    
            if ($result === TRUE) {
                echo "New record created successfully";
                header('Location: ./admin-page.php');
            } else {
                echo "Error: <br>";
            }
        }
    }
    
?>