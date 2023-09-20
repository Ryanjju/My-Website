<header class="header">
    <div class="container">
        <div id="menu-toggle" class="hamburger">
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
            <div class="hamburger__line"></div>
        </div>
        <div class="header__logo">
            <a href="/" class="logo__link">Saver Energy</a>
        </div>
        <nav id="menu-nav" class="header__nav">
            <a href="/" class="nav__link">Home</a>
            <a href="#" class="nav__link">Über uns</a>
            <a href="#" class="nav__link">Kontakt</a>
            <?php
            // check if user is logged in 
            if (isset($_SESSION['status'], $_SESSION['loggedin']) && $_SESSION['status'] === 'success' && $_SESSION['loggedin'] === true) {
                // user is logged in 
                echo "<a href='/logout/' class='nav__link'>Logout</a>";
                echo "<a href='/dashboard/' class='nav__link'>Dashboard</a>";
            } else {
                // user is not logged in 
                echo "<a href='/login/' class='nav__link'>Login</a>";
            }
            ?>
        </nav>
    </div>
</header>