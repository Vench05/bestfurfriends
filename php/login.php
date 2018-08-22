<?php
    include '../config/db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM tbuser WHERE username = '$username' and password = '$password'");
        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
        }
        else {
            echo 'incorect';
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="../img/logo.png">
    <link rel="stylesheet" href="../style/main.css">
    <title>Login</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="../img/bestfurfriends.png" alt="" title="Bestfurfriends The Dog Shop">
        </div>
    </div>  
    <h1 class="login">Login</h1>
    <form class="login-container" action="login.php" method="post">
        <input type="text" name="username" id="" placeholder="Username"> <br>
        <input type="password" name="password" id="" placeholder="Password"> <br>
        <input type="submit" value="Log-in">
    </form>
    <a href="register.php">register</a>
</body>
</html>

