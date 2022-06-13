<?php 
    //session_start(); // Start session
    include 'php/database.php'; // Include database connection

    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['password2'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $name = $_POST['name'];
        
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        
        $result = $bdd->prepare($sql);
        $result->execute();
        
        // Check if user already exists
        if($result->rowCount() > 0) {
            echo "<script>alert('Email already used');</script>";
        } else {
            if ($password === $password2) {
                // Hash password
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                // Gate the date of creation
                $dateNow = date('Y-m-d H:i:s');
                // Request to insert user
                $sql = "INSERT INTO users (email, password, name, created_at, verified) VALUES ('$email', '$passwordHash', '$name', '$dateNow', 0)";
                $result = $bdd->prepare($sql);
                $result->execute();
                echo "<script>alert('Account created, You need to verifie your account now');</script>";
                header('Location: login.php');
            } else {
                echo "<script>alert('Passwords do not match');</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasa - Register</title>
    <link rel="shortcut icon" href="assets/ico/nasa-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/charte-graphique.css">
    <script src="https://kit.fontawesome.com/d50a18be62.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('php/navBar.php') ?>
    <form action="register.php" method="post">
        <img src="assets/ico/nasa-logo.png" alt="Nasa Logo">
        <h1>Register</h1>
        <hr>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="John Doe" require>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="will@gmail.com" require>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="myLittlePwd" require>
        <label for="password2">Password Confirmation</label>
        <input type="password" name="password2" id="password2" placeholder="myLittlePwd" require>
        <button type="submit" name="submit">Register <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
        <p>Already register ? Login now <a href="login.php">here</a></p>
    </form>
</body>
</html>