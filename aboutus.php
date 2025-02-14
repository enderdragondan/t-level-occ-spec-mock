<?php

session_start();
require './includes/auth.php';

?>


<!DOCTYPE html>
<html>

<head>
    <title>About Us | Health Advice Group</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="stylesheet" href="animate.css">
    <style>
        html {
            color-scheme: light;
        }

        html.dark {
            color-scheme: dark;
        }

        .darkBackground {
            background-image:
                linear-gradient(rgba(20, 22, 26, 0.1), rgba(20, 22, 26, 1)),
                url('./assets/images/background.jpg');
            background-size: cover;
            background-position: center;
        }

        .lightBackground {
            background-image:
                linear-gradient(rgba(249, 250, 251, 0.1), rgba(249, 250, 251, 1)),
                url('./assets/images/background.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="has-navbar-fixed-top">

    <?php require 'includes/navbar.php'; ?>

    <section class="hero is-fullheight-with-navbar has-background">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h2 class="title is-1 has-text-centered animate__animated animate__flipInY animate__delay-1s"
                    style="text-shadow: 2px 2px 4px rgba(20, 22, 26, 0.5);">About Us</h2>
                <div class=" columns is-multiline is-centered">
                    <div class="column is-7">
                        <div class="card animate__animated animate__fadeInLeft">
                            <div class="card-image">
                                <figure id="aboutUsLogo" class="image is-5by2">
                                    <img src="./assets/images/full_logo.png" alt="Logo">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <p>Health Advice Group is a non-profit organization that provides health advice and
                                        support to the community. We are dedicated to improving the health and
                                        well-being of individuals by providing accurate and reliable information on
                                        various health topics. Our new specialised software is personalised to your
                                        needs and can provide you with the best advice for your health. We are committed
                                        to helping people make informed and healthy choices for themselves.
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