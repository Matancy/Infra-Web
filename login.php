<?php 
    include 'php/database.php'; // Include database connection

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email = '$email' ";

        $result = $bdd->prepare($sql);
        $result->execute();
    
        if($result->rowCount() > 0) {
            $data = $result->fetchAll();
            if(password_verify($password, $data[0]["password"])) {
                // Connection OK to the account
                $_SESSION['id'] = $data[0]['id'];
                $_SESSION['email'] = $data[0]['email'];
                $_SESSION['name'] = $data[0]['name'];
                $_SESSION['created_at'] = $data[0]['created_at'];
                header('Location: area51.php');
            } else {
                // Password incorrects
                // echo "<script>alert('Mot de passe incorrect');</script>";
            }
        } else {
            // User not found
            // echo "<script>alert('Utilisateur inconnu');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasa - Login</title>
    <link rel="shortcut icon" href="assets/ico/nasa-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/charte-graphique.css">
    <script src="https://kit.fontawesome.com/d50a18be62.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('php/navBar.php') ?>
    <form action="login.php" method="post">
        <?php 
            if(isset($_SESSION['id'])) {
                // echo "Connected as " . $_SESSION['name'];
            }
        ?>
        <img src="assets/ico/nasa-logo.png" alt="Nasa Logo">
        <h1>Login</h1>
        <hr>
        <input type="email" name="email" id="email" placeholder="will@gmail.com" require>
        <input type="password" name="password" id="password" placeholder="myLittlePwd" require>
        <button type="submit" name="submit">Login <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
        <p>Not register yet ? register now <a href="register.php">here</a></p>
    </form>
</body>
</html>