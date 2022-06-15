<?php
include("php/database.php");

$page_private = true;
$affiche_page = true;

if ($page_private == true) {
    if (isset($_SESSION['user'])) {
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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/area51.css">

</head>

<body class="entree">
    <?php
    include('php/navBar.php');

    // Hide the content if the $page_private is true and the user is not logged in
    if ($affiche_page == true) {
    ?>

        <header>
            <div class="attention">
                <h1>Area 51</h1>
                <h2>Confidential</h2>
                <?php
                include('php/distance.php');
                //get client ip
                $ip = $_SERVER['REMOTE_ADDR'];
                $new_arr[] = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip));
                echo '<h5">Distance from area 51: ' . round(distance($new_arr[0]['geoplugin_latitude'], $new_arr[0]['geoplugin_longitude'], $_SERVER['REMOTE_ADDR'], $_SERVER['REMOTE_ADDR']), 2, PHP_ROUND_HALF_UP) . ' milles</h4>';
                ?>
            </div>

            <div class="degrade"></div>
        </header>
        <main>

            <div class="dossier">

                <div class="contenu_dossier">
                    <figure class="conteneur_image_rubrique">
                        <img class="image_histoire" src="assets/img/articleRosewell.jpg" alt="" title="article of the Roswell incident">
                    </figure>
                    <article class="texte_rubriques">
                        <h1>Roswell leaks</h1>
                        <p>On July 8, 1947, during our alien capture mission, we probably left behind some evidence of our actions. It was found the next day by a farmer and published in several newspapers. <br>We did our best to cover it up. </p>
                    </article>

                </div>
            </div>

            <div class="dossier">

                <div class="contenu_dossier">
                    <figure class="conteneur_image_rubrique">
                        <img class="image_histoire" src="assets/img/alien.jpg" alt="" title="article of the Roswell incident">
                    </figure>
                    <article class="texte_rubriques">
                        <h1>Roswell leaks</h1>
                        <p>On July 8, 1947, during our alien capture mission, we probably left behind some evidence of our actions. It was found the next day by a farmer and published in several newspapers. <br>We did our best to cover it up. </p>
                    </article>

                </div>
            </div>



        </main>


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