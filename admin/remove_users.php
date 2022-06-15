<?php

require '../php/database.php';

$req = $bdd->prepare('DELETE * FROM users WHERE created_at < NOW() - INTERVAL 1 DAY AND verified = 0');
$req->execute();

exit();