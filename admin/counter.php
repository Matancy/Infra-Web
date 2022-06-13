<?php

require '../php/database.php';

$message = null;
if (isset($_POST['reset-counter'])) {

    try {
        $req = $bdd->prepare('UPDATE counter SET value = 0 WHERE id = 1');
        $req->execute();
        $message = 'Le compteur a été réinitialisé.';
    } catch (PDOException $e) {
        die ($e->getMessage());
    }
}
?>

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
    <h1>Réglage du compteur</h1>

    <?php if ($message != null) {
        echo "<h3>$message</h3>";
    } ?>

    <form action="post" style="display: flex; justify-content: center;">
        <input type="submit" class="btn" name="reset-counter" value="Réinitialiser le compteur">
    </form>
</body>

</html>