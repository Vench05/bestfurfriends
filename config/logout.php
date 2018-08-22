<?php
    include 'db.php';
    unset($_SESSION['username']);
    
    header('Location: ../index.php');
?>