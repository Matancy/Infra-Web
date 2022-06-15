<?php 
    require './php/database.php'; // Include database connection

    $error = ""; // Initialize error variable
    $message = "No error"; // Initialize message variable

    if(isset($_GET['err'])) {
        $error = $_GET['err'];
    }

    switch ($error) {
        case '400':
            $message = "Bad request";
            break;
        case '401':
            $message = "Unauthorized";
            break;
        case '403':
            $message = "Forbidden";
            break;
        case '404':
            $message = "page not found";
            break;
        case '405':
            $message = "Method not allowed";
            break;
        case '406':
            $message = "Not acceptable";
            break;
        case '407':
            $message = "Proxy authentication required";
            break;
        case '408':
            $message = "Request timeout";
            break;
        case '409':
            $message = "Conflict";
            break;
        case '410':
            $message = "Gone";
            break;
        case '411':
            $message = "Length required";
            break;
        case '412':
            $message = "Precondition failed";
            break;
        case '500':
            $message = "Internal server error";
            break;
        case '501':
            $message = "Not implemented";
            break;
        case '502':
            $message = "Bad gateway";
            break;
        case '503':
            $message = "Service unavailable";
            break;
        case '504':
            $message = "Gateway timeout";
            break;
        default:
            $message = "No error";
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasa - Error page</title>
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
        <h1>Error <?php echo $error; ?></h1>
        <p><?php echo $message; ?></p>
        <i class="fa-solid fa-bug"></i><br>
        <a href="index"><button>Back To Earth 🌎</button></a>
    </div>
    <?php include('php/navBar.php') ?>
    
</body>
</html>