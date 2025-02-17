<?php

session_start();
require './includes/auth.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Partners | Health Advice Group</title>
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
                    Our Partners</h2>
                <div class=" columns is-multiline is-centered">
                    <div class="column is-4">
                        <div class="card animate__animated animate__fadeInLeft">
                            <div class="card-image">
                                <figure class="image is-5by2">
                                    <img src="./assets/images/partner1.png" alt="Vertas Environmental">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <p>Vertas Environmental offers a brokerage and consultancy service. Their
                                        highly experienced team (30 years and counting) can offer you a waste
                                        and recycling package sourced from the whole marketplace. We partnered
                                        with them for our fundraising event.
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="https://vertas.co.uk/company/vertas-environmental/"
                                    class="card-footer-item">Visit
                                    website</a>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="card animate__animated animate__fadeInRight">
                            <div class="card-image">
                                <figure class="image is-5by2">
                                    <img src="./assets/images/partner2.png" alt="MGS Environmental">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <p>MGS Environmental supplies specialist products to the drilling, site
                                        investigation, landfill, ground source heat and rail industries.
                                        Their products are used in site investigation, water well and geothermal
                                        drilling, rail track drainage systems and landfill gas and leachate
                                        management.
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="https://www.mgs.co.uk/" class="card-footer-item">Visit website</a>
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