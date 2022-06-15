<?php
require '../php/database.php'; // Include database connection

$message = null;

// When the user is already conencted 
if (!empty($_SESSION['id'])) {
    $req = $bdd->prepare("SELECT * FROM users WHERE id = ?;");
    $req->execute([$_SESSION['id']]);
    $user = $req->fetch();

    $_SESSION['user'] = $user;
    header('Location: /area51');
    exit();
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $result = $bdd->prepare("SELECT * FROM users WHERE email = ?;");
    $result->execute([$email]);

    if ($result->rowCount() > 0) {
        $data = $result->fetch();
        if (password_verify($password, $data["password"])) {

            if ($data["verified"] == 0) {

                $message = "Please verify your account";
            } else {

                $_SESSION['user'] = $data;
                header('Location: /area51');
                exit();
            }
        } else {
            // Password incorrects
            $message = "Password incorrect";
        }
    } else {
        // User not found
        $message = "User not founded";
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
    <form action="/login" method="post">
        <img src="assets/ico/nasa-logo.png" alt="Nasa Logo">

        <?php if ($message != null) {
            echo '<p class="error">' . $message . '</p>';
        } ?>

        <h1>Login</h1>
        <hr>
        <input type="email" name="email" id="email" placeholder="will@gmail.com" require>
        <input type="password" name="password" id="password" placeholder="myLittlePwd" require>
        <button type="submit" name="submit">Login <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
        <p>Not register yet ? register now <a href="/register">here</a></p>
    </form>
</body>

</html>