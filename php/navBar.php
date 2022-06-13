<nav id="navbar">
    <link rel="stylesheet" href="../style/navbar.css">
    <ul>
        <li class="left"><img src="./assets/ico/nasa-logo.png" alt="" /><a href="index.php">Home</a></li>
        <?php
            if(isset($_SESSION['id'])) {
                echo '<li class="left">Hi, ' . $_SESSION['name'] . '</li>';
                echo '<li class="right"><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li class="right"><a href="register.php">Register</a></li>';
                echo '<li class="right"><a href="login.php">Login</a></li>';
            }
        ?>
    </ul>
</nav>