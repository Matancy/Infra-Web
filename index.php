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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300&display=swap" rel="stylesheet"> 



    <title>ASAN, to discover the univers</title>
</head>
<body class="accueil" title="Photo de Casey Horner, de unsplash.com">
    <header>
        <nav class="nav">
            <ul class="home">
                <li>
                    <a href="index.php"><img class="logo" src="assets/ico/logo_nasa.png" alt="Logo" title="Image made by Pixel Perfect from www.flaticon.com"></a>
                </li>
                <li class="list_element">
                    <a class="link_list_element" href="">Login/Register</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="introduction">
            <h1>ASAN</h1>
            <h2>To discover the univers</h2>
            
            <!-- Compteur de la durée du voyage de la sonde Voyageur 1 -->
            <?php
                $depart = "15-06-1995";
                $aujourdhui = date("Y-m-d");
                $diff = date_diff(date_create($depart), date_create($aujourdhui));
                echo '<p class="texte_voyageur1">The Voyageur spacecraft 1 left the earth for <br><span class="duree_voyage_voyageur1">'.$diff->format('%y') . 'years</span>' . '</p>';
            ?>
        </div>

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
                <img class="image_missions" src="assets/img/image_missions.png" alt="" title="Photo de la NASA de unsplash.com">
                <article class="texte_rubriques">
                    <h1>Missions in progress</h1> 
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit, ipsum quidem illo dolorem odit libero ea corrupti fugiat aperiam mollitia? Quidem exercitationem, iure ab corporis doloremque magni minus repudiandae at. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit magni illum consectetur repellendus tenetur asperiores? Sint, corporis! Perferendis quidem voluptas quis quam! Quidem fuga placeat obcaecati incidunt facilis quae itaque? Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quis minus libero! Laborum quo, saepe culpa, asperiores voluptates at facilis voluptate iusto nostrum consequatur tenetur iure labore a fugit temporibus.</p>
                </article>                
            </div>
        </div>
    </main>
    <footer>
        <p>ASAN - 2022 - <a href="">Legal notice</a></p> 
    </footer>
</body>
</html>