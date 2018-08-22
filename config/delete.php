<?php 
    include 'db.php';

if(isset($_POST['delete'])) {
    $id = $_POST['id'];
    mysqli_query($conn, "DELETE FROM `tbproduct` WHERE id = '$id'");
    header('Location: ../php/admin-page.php');
}

?>