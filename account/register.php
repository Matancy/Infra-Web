<?php
include 'php/database.php'; // Include database connection

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

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']) && !empty($_POST['password2'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];

    $result = $bdd->prepare("SELECT * FROM users WHERE email = ?;");
    $result->execute([$email]);

    // Check if user already exists
    if ($result->rowCount() > 0) {
        $message = "User already exists";
    } else {
        if ($password === $password2) {
            // Hash password
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            // Gate the date of creation
            $dateNow = date('Y-m-d H:i:s');

            //Generate a random string.
            $token = openssl_random_pseudo_bytes(56);

            //Convert the binary data into hexadecimal representation.
            $token = bin2hex($token);

            // Request to insert user
            $result = $bdd->prepare("INSERT INTO users (`name`, `email`, `password`, `created_at`, `verified`, `token`) VALUES (?, ?, ?, ?, 0, ?);");
            $result->execute([$name, $email, $passwordHash, $dateNow, $token]);
            $message = "Account created, please verify your email";
            header('Location: /login');
            exit();
        } else {
            $message = "Passwords don't match";
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
    <form action="/register" method="post">
        <img src="assets/ico/nasa-logo.png" alt="Nasa Logo">

        <?php if ($message !== null) {
            echo '<div class="message">' . $message . '</div>';
        } ?>

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
        <p>Already register ? Login now <a href="login">here</a></p>
    </form>
</body>

</html>