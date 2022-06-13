<?php 
    include 'php/database.php'; // Include database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasa - Login</title>
    <link rel="shortcut icon" href="assets/ico/nasa-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/charte-graphique.css">
    <script src="https://kit.fontawesome.com/d50a18be62.js" crossorigin="anonymous"></script>
    <style>
        div.container {
            width: 80%;
            padding: 10px;
            top: 50%;
            transform: translateY(30%);
            text-align: center;
            background-color: white;
            color: #262626;
            border-radius: 24px;
        }

        div.container h1 {
            text-align: center;
            font-size: 4rem;
            font-size: 30px;
            font-weight: bold;
        }

        div.container button {
            border-radius: 8px;
            margin: 8px ;
            padding: 12px;
            background-color: #262626;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            cursor: pointer; 
            background: rgb(9,210,79);
            background: linear-gradient(21deg, rgba(9,210,79,1) 0%, rgba(0,151,255,1) 100%); 
        }

        div.container i {
            font-size: 10rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Error 404</h1>
        <p>page not found</p>
        <i class="fa-solid fa-bug"></i><br>
        <a href="index.php"><button>Back To Earth 🌎</button></a>
    </div>
    <?php include('php/navBar.php') ?>
    
</body>
</html>