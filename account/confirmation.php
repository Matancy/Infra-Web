<?php

require '../php/database.php';

if (isset($_GET["token"])) {

    $token = htmlspecialchars($_GET["token"]);
    $statusProcedure = "Account not verified";

    $result = $bdd->prepare("SELECT * FROM users WHERE token = ?;");

    $result->execute([$token]);

    if ($result->rowCount() > 0) {
        $result = $bdd->prepare("UPDATE users SET verified = 1, token = -1 WHERE token = ?;");
        $result->execute([$token]);

        $statusProcedure = "Account verified";
        header('Location: /login');
        exit();
    } else {
        $statusProcedure = "Account not found";
    }
} else {
    $statusProcedure = "No token provided or you are not logged in";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Asan, is the biggest british agency in the space sector">
    <meta name="keywords" content="Asan, space, Great Britain">
    <meta name="author" content="Jérémie Lostanlen">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/charte-graphique.css">
    <title>Nasa - Confirmation</title>
</head>

<body>
    <header>
        <?php include('../php/navBar.php') ?>
    </header>
    <main id="confirmation">

        <h1><?php echo $statusProcedure; ?></h1>
        <br>
        <a href="index.php"><button>Back To Home</button></a>

    </main>
    <footer>
        <p>NASA - 2022 - <a href="">Legal notice</a></p>
    </footer>
</body>

</html>