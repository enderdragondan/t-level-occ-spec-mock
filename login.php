<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login | Health Advice Group</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="has-navbar-fixed-top">

    <?php require 'includes/navbar.php'; ?>

    <section class="hero is-fullheight-with-navbar has-background"
        style="background-image: linear-gradient(rgba(20, 22, 26, 0.1), rgba(20, 22, 26, 1)), url('./assets/images/background.jpg'); background-size: cover; background-position: center;">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1 theme-dark has-text-centered animate__animated animate__flipInX animate__delay-1s"
                    style="text-shadow: 2px 2px 4px rgba(20, 22, 26, 0.5);">
                    Log In
                </h1>
                <div class="columns is-centered">
                    <div class="column is-7-tablet is-6-desktop is-5-widescreen">
                        <form action="login.php" method="POST" class="box animate__animated animate__fadeIn">
                            <div class="field">
                                <label for="" class="label">Username</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="username" placeholder="e.g. johndoe123" class="input"
                                        required>
                                    <span class="icon is-small is-left">
                                        <i class="far fa-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="" class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input type="password" name="password" placeholder="*******" class="input" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <button type="submit" class="button is-success is-fullwidth">
                                    Log In
                                </button>
                            </div>
                            <hr>
                            <div class="field">
                                <a class="button is-fullwidth" href="signup.php">
                                    Don't have an account? Sign Up
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="general.js"></script>
</body>

</html>