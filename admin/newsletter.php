<?php

require '../php/database.php';
require "Mail.php";

$message = null;
if (isset($_POST['send-message'])) {

    Mail::sendMail("sae@cpmtech.fr", "matheo.tichy@gmail.com", "sae@cpmtech.fr", "SAE", "test", "message de test");

    // if (!empty($_POST['object']) and !empty($_POST['message'])) {
    //     $message = 'Please fill all the fields.';
    // }
    // if ($message != null) {

    //     try {
    //         // $req = $bdd->prepare('UPDATE counters SET value = 0 WHERE id = 1');
    //         // $req->execute();
    //         // $message = 'Le compteur a été réinitialisé.';
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }
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
    <h1>Send newsletter message</h1>

    <?php if ($message != null) {
        echo "<h3>$message</h3>";
    } ?>

    <form method="post" style="display: flex; justify-content: center;">
        <label for="object">Message object :</label>
        <input type="text" name="object" id="object" required>
        <label for="message">Message content :</label>
        <textarea name="message" id="message" cols="30" rows="10" required></textarea>
        <input type="submit" class="btn" name="send-message" value="Send message">
    </form>
</body>

</html>