<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/charte-graphique.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin section</title>
</head>

<body class="background-admin">
    <header>
        <?php include('php/navBar.php') ?>
    </header>
    <div class="admin-hub">
        <a class="admin-hub-icon" href="counter.php">
            <img src="../assets/ico/counter.png" alt="Icône de compteur">
            <h3>Réglage du compteur</h3>
        </a>
        <a class="admin-hub-icon" href="newsletter.php">
            <img src="../assets/ico/mail.png" alt="Icône de mail">
            <h3>Newsletter</h3>
        </a>
    </div>
</body>

</html>