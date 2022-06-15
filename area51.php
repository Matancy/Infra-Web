<?php 
    require './php/database.php';

    $page_private = true;
    $affiche_page = true;
    
    if($page_private == true) {
        if(isset($_SESSION['id'])) {
            $affiche_page = true;
        } else {
            $affiche_page = false;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confidential - Area 51</title>
    <link rel="shortcut icon" href="assets/ico/nasa-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/charte-graphique.css">
    <link rel="stylesheet" href="style/area51.css">

</head>
<body>
    <?php 
        include('php/navBar.php');
        
        // Hide the content if the $page_private is true and the user is not logged in
        if($affiche_page == true) {
    ?>
    <h1>Do not leak this informations</h1>
    <?php 
        include('php/distance.php');
        //get client ip
        $ip = $_SERVER['REMOTE_ADDR'];

        $new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
        //echo "<h4 style=\"color : white\">Latitude:".$new_arr[0]['geoplugin_latitude']." and Longitude:".$new_arr[0]['geoplugin_longitude'].'</h4>';        
        echo '<h4 style="color : red">Distance: ' . distance($new_arr[0]['geoplugin_latitude'], $new_arr[0]['geoplugin_longitude'], $_SERVER['REMOTE_ADDR'], $_SERVER['REMOTE_ADDR']) . ' km</h4>';
    ?>





    <?php 
        } else {
            echo '
            <div class="error">
                <h1 id="notLogged">You are not logged in</h1>
                <h3>If you want to see this page, please login</h3>
                <a href="login.php"><button class="login">Login 🌎</button></a>
            </div>
            ';
        }
    ?>
</body>
</html>