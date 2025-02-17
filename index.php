<?php

////////////////////////////////////////////
// This is the home page of the website. It contains a brief introduction to the website and its purpose, as well as some information
// about the organization and its partners. It also includes some testimonials from customers who have used the website and found it helpful. 
// Users can sign up for an account or log in to access their dashboard and get personalized health advice.
////////////////////////////////////////////

// Initialise the session and include required files
session_start();
require './includes/auth.php';

?>

<!DOCTYPE html>
<html>

<head>
    <!-- Meta tags for compatibility for all devices -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Set the page title -->
    <title>Health Advice Group</title>
    <!-- Include required CSS files -->
    <link rel="stylesheet" type="text/css" href="bulma.css">
    <link rel="stylesheet" type="text/css" href="animate.css">
    <link rel="stylesheet" href="additional.css">
</head>

<body class="has-navbar-fixed-top">

    <!-- Import the navbar to page -->
    <?php require './includes/navbar.php'; ?>

    <!-- Main content of the page -->
    <section class="hero is-fullheight-with-navbar has-background">
        <div class="hero-body">
            <div class="container has-text-centered">
                <!-- Title in centre of page -->
                <h1 class="title is-1 animate__animated animate__flipInX animate__slower text-shadow-custom">Welcome to
                    Health Advice Group
                </h1>
                <!-- Subtitle linked to title above -->
                <p class="subtitle is-3 animate__animated animate__flipInY animate__delay-1s text-shadow-custom">
                    Your health is our priority.
                </p>
                <!-- Button to go to dashboard if logged in, or sign up if not -->
                <?php if (isLoggedIn()): ?>
                    <a href="dashboard.php" class="button is-primary is-large animate__animated animate__fadeInUp animate__delay-1s">
                        Go to your Dashboard
                        <img src="./assets/icons/arrow.png" class="icon-gap" width="25px" height="25px">
                    </a>
                <?php else: ?>
                    <a href="signup.php" class="button is-info is-large animate__animated animate__fadeInUp animate__delay-1s btn-shadow">
                        Sign up now for FREE!
                        <img src="./assets/icons/arrow.png" class="icon-gap" width="25px" height="25px">
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- Footer of the hero section, disappears upon scrolling (general.js) -->
        <div id="homeHeroFoot"
            class="hero-foot has-text-centered animate__animated animate__fadeInDown animate__delay-1s">
            <p class="subtitle is-6">Scroll down to Learn More</p>
            <!-- Arrow icon below text -->
            <img class="animate__animated " src="./assets/icons/arrow.png" width="50px" height="50px"
                style="margin-bottom: 10px; filter: invert(1); transform: rotate(90deg) !important;">
        </div>
    </section>

    <!-- Connector to somoothly transition from the hero to the lower sections, changes colour based on theme (general.js) -->
    <section id="connectorHome" class="section">
    </section>

    <!-- Main content of the page -->
    <!-- About us section -->
    <section id="homeabout" class="section animate__animated">
        <div class="container">
            <div class="columns is-vcentered">
                <!-- Image on left side of page, above on mobile -->
                <div class="column is-6">
                    <figure class="image is-4by3">
                        <img class="is-rounded" src="./assets/images/hands.jpg" alt="Environmental Health">
                    </figure>
                </div>
                <!-- Text on right side of page, below on mobile -->
                <div class="column is-6">
                    <h2 class="title is-2 is-spaced">About Us</h2>
                    <p class="subtitle is-4">
                        Health Advice Group is a non-profit organization that provides free health advice to everyone.
                        Our mission is to help people live healthier lives by providing them with the information they
                        need to make informed decisions about their health.
                    </p>
                    <!-- Button to go to about us page -->
                    <a href="aboutus.php" class="button is-primary">Learn more</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners section -->
    <section id="homepartners" class="section">
        <div class="container">
            <!-- Title of section -->
            <h2 class="title is-3 has-text-centered">Our Partners</h2>
            <div class="columns is-multiline is-centered">
                <!-- Card for first partner -->
                <div class="column is-4">
                    <div class="card">
                        <!-- Partner logo on top of card -->
                        <div class="card-image">
                            <figure class="image is-5by2">
                                <img src="./assets/images/partner1.png" alt="Vertas Environmental">
                            </figure>
                        </div>
                        <!-- Footer of card with links to learn more, sending you to the partners page, and visit partner website -->
                        <div class="card-footer">
                            <a href="partners.php" class="card-footer-item">Learn more</a>
                            <a href="https://vertas.co.uk/company/vertas-environmental/" class="card-footer-item">Visit
                                website</a>
                        </div>
                    </div>
                </div>
                <!-- Card for second partner -->
                <div class="column is-4">
                    <div class="card">
                        <!-- Partner logo on top of card -->
                        <div class="card-image">
                            <figure class="image is-5by2">
                                <img src="./assets/images/partner2.png" alt="MGS Environmental">
                            </figure>
                        </div>
                        <!-- Footer of card with links to learn more, sending you to the partners page, and visit partner website -->
                        <div class="card-footer">
                            <a href="partners.php" class="card-footer-item">Learn more</a>
                            <a href="https://www.mgs.co.uk/" class="card-footer-item">Visit website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews section -->
    <section id="homereviews" class="section">
        <div class="container">
            <!-- Title of section -->
            <h2 class="title is-2 has-text-centered">What the Customers Think</h2>
            <div class="columns is-multiline">
                <!-- Card for first review -->
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <!-- Portrait and name of reviewer -->
                            <div class="media has-text-centered">
                                <!-- Portrait of reviewer left aligned -->
                                <div class="media-left">
                                    <figure class="image is-96x96">
                                        <img class="is-rounded" src="./assets/images/jonny.jpg" alt="Jonny Newton" />
                                    </figure>
                                </div>
                                <!-- Name and title of reviewer next to portrait -->
                                <div class="media-content" style="margin-top: 20px; overflow: visible;">
                                    <p class="title is-3" style="white-space: nowrap;">Jonathan Newton</p>
                                    <p class="subtitle is-5" style="white-space: nowrap;">"PHP Mastermind"</p>
                                </div>
                            </div>
                            <!-- Review content -->
                            <div class="content">
                                This is some of the <strong>best</strong> health advice I've ever received. I
                                <strong>highly recommend</strong> Health
                                Advice Group to anyone looking to improve their health. Also, I actually don't know any
                                PHP.
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card for second review -->
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <!-- Portrait and name of reviewer -->
                            <div class="media has-text-centered">
                                <!-- Portrait of reviewer left aligned -->
                                <div class="media-left">
                                    <figure class="image is-96x96">
                                        <img class="is-rounded" src="./assets/images/nathan.jpg" alt="Jonny Newton" />
                                    </figure>
                                </div>
                                <!-- Name and title of reviewer next to portrait -->
                                <div class="media-content" style="margin-top: 20px; overflow: visible;">
                                    <p class="title is-3" style="white-space: nowrap;">Nathan Gallagher</p>
                                    <p class="subtitle is-5" style="white-space: nowrap;">"biggest nerd in gateshead"
                                    </p>
                                </div>
                            </div>
                            <!-- Review content -->
                            <div class="content">
                                I have <strong>never</strong> had a better experience than using this website. The
                                advice is <strong>top-notch</strong>
                                and I've been able to comfortably leave my home! <strong>Thank you</strong>, Health
                                Advice Group!
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card for third review -->
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <!-- Portrait and name of reviewer -->
                            <div class="media has-text-centered">
                                <!-- Portrait of reviewer left aligned -->
                                <div class="media-left">
                                    <figure class="image is-96x96">
                                        <img class="is-rounded" src="./assets/images/marcel.jpg" alt="Jonny Newton" />
                                    </figure>
                                </div>
                                <!-- Name and title of reviewer next to portrait -->
                                <div class="media-content" style="margin-top: 20px; overflow: visible;">
                                    <p class="title is-3" style="white-space: nowrap;">Marcel Matz</p>
                                    <p class="subtitle is-5" style="white-space: nowrap;">"ChatGPT Power User"
                                    </p>
                                </div>
                            </div>
                            <!-- Review content -->
                            <div class="content">
                                Honestly, I haven't even used this website, and I never
                                will, but it looks <strong>kinda cool</strong> I
                                guess. I'd rather just ask ChatGPT for my health advice though. I don't even go to the
                                doctor anymore!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Import the footer to the page -->
    <?php require './includes/footer.php'; ?>

    <!-- Include required JS files -->
    <script type="text/javascript" src="general.js"></script>
</body>

</html>