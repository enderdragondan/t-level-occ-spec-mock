<?php

?>

<nav class="navbar is-fixed-top animate__animated animate__fadeInDown" role="navigation" aria-label="main navigation">
    <div class="navbar-brand animate__animated animate__fadeInLeft">
        <a id="logonavbar" class="navbar-item" href="/" style="margin-right: 20px;">
            <img src="../assets/images/full_logo.png" width="150px" alt="Logo" style="max-height: 200px;">
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbar"
            aria-controls="navbar">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbar" class="navbar-menu" style="overflow: visible;">
        <div class="navbar-start animate__animated animate__fadeInLeft">

            <a class="navbar-item" href="aboutus.php" style="margin-right: 20px;">
                <strong>About Us</strong>
            </a>
            <a class="navbar-item" href="partners.php" style="margin-right: 20px;">
                <strong>Partners</strong>
            </a>
            <a class="navbar-item" href="donate.php" style="margin-right: 20px;">
                <strong>Donate</strong>
            </a>
        </div>
        <div class="navbar-end animate__animated animate__fadeInRight">
            <div class="navbar-item">
                <?php if ($isloggedin): ?>
                    <a class="button is-primary" href="dashboard.php">
                        Dashboard
                    </a>
                </div>
                <div class="navbar-item has-dropdown">
                    <a class="navbar-link">
                        Account
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="settings.php">
                            Preferences
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="logout.php">
                            Log out
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <a class="button is-info" href="signup.php">
                    Sign up
                </a>
                <a class="button" href="login.php">
                    Log in
                </a>
            <?php endif; ?>
            <div class="navbar-item">
                <button id="themeButton" class="button">
                    <img width="25px" height="25px" src="../assets/icons/theme_switcher.png" alt="Theme">
                </button>
            </div>

        </div>
    </div>
</nav>