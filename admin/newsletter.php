<?php

require '../php/database.php';
require "Mail.php";

$messageContent = null;

if (isset($_POST['send-message'])) {

    if (empty($_POST['object']) and empty($_POST['message'])) {

        $messageContent = 'Please fill all the fields.';
    } else

        try {
            $req = $bdd->prepare('SELECT email FROM newsletter WHERE inscription = 1');
            $req->execute();
            $emails = $req->fetchAll();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    if (!empty($emails)) {
        foreach ($emails as $email) {
            $emailMessage = $_POST['message'] . "\n\n <a href='https://www.saereseau.cpmtech.fr/unsubscribe/" . $email['email'] . "'>Unsubscribe</a>";
            Mail::sendMail("saereseau@cpmtech.fr", $email['email'], "saereseau@cpmtech.fr", "SAE Réseau", htmlspecialchars($_POST['object']), htmlspecialchars($emailMessage));
        }
        $messageContent = "Mail has been sent";
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
    <h1>Send newsletter message</h1>

    <?php if ($messageContent != null) {
        echo "<h3>$messageContent</h3>";
    } ?>

    <form method="post" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <div style="padding: 1rem;">
            <label for="object">Message object :</label><br>
            <input type="text" name="object" id="object" required>
        </div>
        <div style="padding: 1rem;">
            <label for="message">Message content :</label><br>
            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
        </div>
        <div style="padding: 1rem;">
            <input type="submit" class="btn" name="send-message" value="Send message">
        </div>
    </form>
</body>

</html>