<?php
    include '../config/db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $adress = $_POST['adress'];
        $email = $_POST['email'];
        $bday = $_POST['bday'];

        if ($password == $confirmPass) {
            $result = mysqli_query($conn, "INSERT INTO tbuser (username, password, first_name, last_name, adress, email, bday)
            VALUE ('$username', '$password', '$first_name', '$last_name', '$adress', '$email', '$bday')");
            if ($result === TRUE) {
                echo "New record created successfully";

                $_SESSION['username'] = $username;
                header('Location: ../index.php');
            } else {
                echo "Error: <br>";
            }
        }
        else {
            echo 'does not match';
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    
    <link rel="stylesheet" href="../style/main.css">
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="../img/bestfurfriends.png" alt="" title="Bestfurfriends The Dog Shop">
        </div>
    </div>  

    <h1 class="reg">Register</h1>
    
    <form action="register.php" method="post" class="register-form">
        <div class="reg-left">
            <div>
                <span>First Name*</span> <br>
                <input type="text" name="first_name" id="" placeholder="First Name" required>
            </div>
            <div>
                <span>Last Name*</span> <br>
                <input type="text" name="last_name" id="" placeholder="Last Name" required>
            </div>
            <div>
                <span>Adress*</span> <br>
                <input type="text" name="address" id="" placeholder="Address" required>
            </div>
            <div>
                <span>Birth-day*</span> <br>
                <input type="date" name="bday" id="" placeholder="Birthday" required>
            </div>
        </div>
        <div class="reg-right">
            <div>
                <span>Email*</span> <br>
                <input type="email" name="email" id="" placeholder="Email" required>
            </div>
            <div>
                <span>Username*</span> <br>
                <input type="text" name="username" id="" placeholder="Username" required>
            </div>
            <div>
                <span>Password*</span> <br>
                <input type="password" name="password" id="" placeholder="Password" required>
            </div>
            <div>
                <span>Confirm Password*</span> <br>
                <input type="password" name="confirmPass" id="" placeholder="Confirm Password" required>
            </div>
        </div>
        
        <div class="reg-btn">
            <input type="submit" value="Register">
        </div>
    </form>
</body>
</html>