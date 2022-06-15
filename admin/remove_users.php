<?php

require '../php/database.php';

$req = $bdd->prepare('DELETE * FROM users WHERE created_at < NOW() - INTERVAL 1 DAY');
$req->execute();

exit();