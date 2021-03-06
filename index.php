<?php
    require './php/database.php';

    $req = $bdd->prepare("SELECT * FROM counters WHERE id = 1");
    $req->execute();
    $result = $req->fetch();
    $value = $result['value'];
    $counter = intval($value) + 1;
    $req = $bdd->prepare("UPDATE counters SET value = ? WHERE id = 1");
    $req->execute([$counter]);


    if(isset($_POST['email']) && isset($_POST['submit'])) {
        $email = htmlspecialchars($_POST['email']);
        $req = $bdd->prepare("INSERT INTO `newsletter` (`email`, `inscription`) VALUES (?, '1');");
        $req->execute([$email]);
    }
    
    ?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Asan, is the biggest british agency in the space sector">
        <meta name="keywords" content="Asan, space, Great Britain">
        <meta name="author" content="Jérémie Lostanlen">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/charte-graphique.css">
        <title>NASA, to discover the univers</title>
    </head>
    
    <body class="accueil" title="Photo de Casey Horner, de unsplash.com">
    <header>
        <?php include('php/navBar.php') ?>
    </header>
    <main>
        <div class="introduction">
            <h1>NASA</h1>
            <h2>To discover the univers</h2>
            <p>Already <?php
                echo $value;
            ?> views.</p>
        </div>

        <!-- Compteur de la durée du voyage de la sonde Voyageur 1 -->
        <div class="rubriques">

            <div class="contenu_rubriques">
                <figure class="conteneur_image_rubrique">
                    <img class="image_histoire" src="assets/img/image_histoire.jpg" alt="" title="Photo de History in HD de unsplash.com">
                </figure>
                <article class="texte_rubriques">
                    <h1>History</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quis minus libero! Laborum quo, saepe culpa, asperiores voluptates at facilis voluptate iusto nostrum consequatur tenetur iure labore a fugit temporibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, non sequi, minus, velit accusantium illum laboriosam repellendus voluptatum repellat necessitatibus commodi quasi animi? Incidunt praesentium ex ipsum tenetur! Consequatur, aperiam. lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo laborum blanditiis repellat quo. Quis, eveniet. Perferendis rerum a repellendus blanditiis nihil</p>
                </article>
            </div>

            <div class="contenu_rubriques">
                <figure class="conteneur_image_rubrique">
                    <img class="image_voyageur" src="assets/img/voyageur.jpg" alt="Engin spacial qui décolle" title="Photo de SpaceX, de unsplash.com">
                </figure>
                <article class="texte_rubriques">
                    <h1>The voyager spacecraft left the earth since
                        <?php
                        $depart = "1977-09-05";
                        $aujourdhui = date("Y-m-d");
                        $diff = date_diff(date_create($depart), date_create($aujourdhui));
                        echo '<span class="duree_voyage_voyageur1">' . $diff->format('%y') . ' years</span>';
                        ?>
                    </h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quis minus libero! Laborum quo, saepe culpa, asperiores voluptates at facilis voluptate iusto nostrum consequatur tenetur iure labore a fugit temporibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, non sequi, minus, velit accusantium illum laboriosam repellendus voluptatum repellat necessitatibus commodi quasi animi? Incidunt praesentium ex ipsum tenetur! Consequatur, aperiam. lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo laborum blanditiis repellat quo. Quis, eveniet. Perferendis rerum a repellendus blanditiis nihil</p>
                </article>
            </div>

            <div class="contenu_rubriques">
                <img class="image_missions" src="assets/img/image_missions.png" alt="" title="Photo de la NASA de unsplash.com">
                <article class="texte_rubriques">
                    <h1>Missions in progress</h1>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, ipsum quidem illo dolorem odit libero ea corrupti fugiat aperiam mollitia? Quidem exercitationem, iure ab corporis doloremque magni minus repudiandae at. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit magni illum consectetur repellendus tenetur asperiores? Sint, corporis! Perferendis quidem voluptas quis quam! Quidem fuga placeat obcaecati incidunt facilis quae itaque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quis minus libero! Laborum quo, saepe culpa, asperiores voluptates at facilis voluptate iusto nostrum consequatur tenetur iure labore a fugit temporibus.</p>
                </article>
            </div>
            <div class="contenu_newsletter">
                <h1 style="text-align: center;">Subscribe to the newsletter</h1>
                <form action="index.php" method="POST">
                    <label for="email">email</label>
                    <input type="email" name="email" placeholder="joe@fedex.us"/>
                    <input type="submit" name="submit" value="Subscribe"/>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <p>NASA - 2022 - <a href="">Legal notice</a></p>
    </footer>
</body>

</html>