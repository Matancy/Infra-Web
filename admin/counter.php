<?php

require '../php/database.php';

$message = null;
if (isset($_POST['reset-counter'])) {

    try {
        $req = $bdd->prepare('UPDATE counters SET value = 0 WHERE id = 1');
        $req->execute();
        $message = 'Counter has been reset.';
    } catch (PDOException $e) {
        die($e->getMessage());
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
    <header>
        <?php include('../php/navBar.php') ?>
    </header>
    <h1>Counter settings</h1>

    <?php if ($message != null) {
        echo "<h3>$message</h3>";
    } ?>

    <form method="post" style="display: flex; justify-content: center;">
        <input type="submit" class="btn" name="reset-counter" value="Reset counter">
    </form>
</body>

</html>