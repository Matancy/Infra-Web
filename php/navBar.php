<nav id="navbar">
    <ul>
        <li class="left"><img src="./assets/ico/nasa-logo.png" alt=""/><a href="index">Home</a></li>
        <?php
            if(isset($_SESSION['user']['id'])) {
                echo '<li class="left">Hi, ' . $_SESSION['user']['name'] . '</li>';
                echo '<li class="right"><a href="/logout">Logout</a></li>';
                echo '<li class="right"><a href="/area51">Area 51</a></li>';
            } else {
                echo '<li class="right"><a href="/register">Register</a></li>';
                echo '<li class="right"><a href="/login">Login</a></li>';
                echo '<li class="right"><a href="/admin">Admin</a></li>';
            }
        ?>
    </ul>
</nav>