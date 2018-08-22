<?php
    include 'db.php';
    $id = $_GET['id'];

    $result = mysqli_query($conn ,"SELECT * FROM tbproduct WHERE id = '$id'");

    $product = mysqli_fetch_object($result);
    echo json_encode($product);

?>
