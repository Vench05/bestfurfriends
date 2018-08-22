<?php
    include '../config/db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $image = $_POST['image'];

        $result = mysqli_query($conn, "INSERT INTO `tbaddtocart`(`user_id`, `name`, `price`, `image`) 
        VALUES ('$user_id', '$name', '$price', '$image') ");

if ($result === TRUE) {
    echo "New record created successfully";
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    }

?>