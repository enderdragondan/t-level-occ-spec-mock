<?php

session_start();
require './includes/auth.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donate | Health Advice Group</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="additional.css">
</head>

<body class="has-navbar-fixed-top">

    <?php require 'includes/navbar.php'; ?>

    <section class="hero is-fullheight-with-navbar has-background">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h2
                    class="title is-1 has-text-centered animate__animated animate__flipInY animate__delay-1s text-shadow-custom">
                    Donate</h2>
                <div class=" columns is-multiline is-centered">
                    <div class="column is-5">
                        <div class="card animate__animated animate__fadeInLeft">
                            <div class="card-content">
                                <div class="content">
                                    <p>Donations are currently not available. Please check back later.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require './includes/footer.php'; ?>
    <script type="text/javascript" src="general.js"></script>
</body>

</html>