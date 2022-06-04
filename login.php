<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasa - Login</title>
    <link rel="shortcut icon" href="assets/ico/nasa-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/login.css">
    <script src="https://kit.fontawesome.com/d50a18be62.js" crossorigin="anonymous"></script>
</head>
<body>
    <form action="login.php" methode="POST">
        <img src="assets/ico/nasa-logo.png" alt="Nasa Logo">
        <h1>Login</h1>
        <hr>
        <input type="email" name="email" id="email" placeholder="will@gmail.com" require>
        <input type="password" name="password" id="password" placeholder="myLittlePwd" require>
        <button type="submit" name="submit">Login <i class="fa-solid fa-arrow-right-to-bracket"></i></button>
        <p>Not register yet ? register now <a href="#">here</a></p>
    </form>
</body>
</html>