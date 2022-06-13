<style>
    :root {
        --navbarH: 40px;
        --navBarColorBG: rgba(0, 0, 0, 0.6);
        --navBarColorHover: rgba(255, 0, 90, 1);
    }
    nav#navbar {
        background-color: var(--navBarColorBG);
        color: #fff;
        padding: 0.5rem;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
    }
     
    nav#navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    nav#navbar ul li {
        height: var(--navbarH);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        flex-wrap: nowrap;
    }

    nav#navbar ul li.left {
        float: left;
    }

    nav#navbar ul li.right {
        float: right;
    }

    nav#navbar ul li a {
        text-decoration: none;
        color: #fff;
        margin: 0px 16px;
        font-weight: bold;
        font-size: 1.2rem;
        height: max-content;
        transition: 0.3s ease-in-out;
    }

    nav#navbar ul li img {
        width: fit-content;
        max-width: var(--navbarH);
        border-radius: 50%;
        margin-right: 16px;
    }

    nav#navbar ul li a:hover {
        color: var(--navBarColorHover);
    }
</style>
<nav id="navbar">
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