<?php
    include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $imagePath = "../img/product/".$_FILES['product-img']['name'];
        
        if(file_exists($_FILES['product-img']['tmp_name']) || is_uploaded_file($_FILES['product-img']['tmp_name'])) {
            if (copy($_FILES['product-img']['tmp_name'], $imagePath)) {
                $result =  mysqli_query($conn, "UPDATE tbproduct 
                SET 
                name='{$name}',image='{$imagePath}',price='{$price}',quantity='{$quantity}',category='{$category}',description='{$description}'
                WHERE id = '{$id}'");
            
                if ($result == true) {
                    echo "update record created successfully";
                    header('Location: ../php/admin-page.php');
                    
                }
                else {
                    
                    echo "update record not";
                }
            }
        
        }
        else {
            $result =  mysqli_query($conn, "UPDATE tbproduct SET name='{$name}',price='{$price}',quantity='{$quantity}',category='{$category}',description='{$description}' WHERE id = '{$id}'");
            if ($result == true) {
                echo "update record created successfully";
            }
            else {
                
                echo "update record not";
            }
        }
    }
}
?>