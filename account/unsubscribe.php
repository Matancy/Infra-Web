<?php

require '../php/database.php';

if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $result = $bdd->prepare("UPDATE newsletter SET inscription = 0 WHERE email = ?;");
    $result->execute([$email]);

    $message = "You are now unsubscribe to our newsletter";
} else {
    $message = "No email provided";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasa - Unsubscribe</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/charte-graphique.css">
</head>

<body>
    <?php include('../php/navBar.php') ?>
    <main id="confirmation">
        <h1><?php echo $message; ?></h1>
        <a href="/"><button class="login">Home 🌎</button></a>
    </main>
</body>

</html>