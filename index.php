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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health Advice Group</title>
    <link rel="stylesheet" type="text/css" href="bulma.css">
    <link rel="stylesheet" type="text/css" href="animate.css">
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

        .lightConnector {
            background-image:
                linear-gradient(rgba(249, 250, 251, 0.1), rgba(249, 250, 251, 1));
        }

        .darkConnector {
            background-image:
                linear-gradient(rgba(20, 22, 26, 0.1), rgba(20, 22, 26, 1));
        }
    </style>
</head>

<body class="has-navbar-fixed-top">

    <?php require './includes/navbar.php'; ?>

    <section class="hero is-fullheight-with-navbar has-background">
        <div class="hero-body">
            <div class="container  has-text-centered">
                <h1 class="title is-1 animate__animated animate__flipInX animate__slower"
                    style="text-shadow: 2px 2px 4px rgba(20, 22, 26, 0.5);">Welcome to Health Advice Group
                </h1>
                <p class="subtitle is-3 animate__animated animate__flipInY animate__delay-1s"
                    style="text-shadow: 2px 2px 4px rgba(20, 22, 26, 0.5);">
                    Your health is our priority.
                </p>
                <?php if (isLoggedIn()): ?>
                    <a href="dashboard.php"
                        class="button is-primary is-large animate__animated animate__fadeInUp animate__delay-1s">Go to your
                        Dashboard<img src="./assets/icons/arrow.png" width="25px" height="25px"
                            style="margin-left: 10px; margin-top: 1px;"></a>
                <?php else: ?>
                    <a href="signup.php"
                        class="button is-info is-large animate__animated animate__fadeInUp animate__delay-1s"
                        style="box-shadow: 4px 4px 8px rgba(20, 22, 26, 0.5);">Sign up now
                        for FREE!<img src="./assets/icons/arrow.png" width="25px" height="25px"
                            style="margin-left: 10px; margin-top: 1px;"></a>
                <?php endif; ?>
            </div>
        </div>
        <div id="homeHeroFoot"
            class="hero-foot has-text-centered animate__animated animate__fadeInDown animate__delay-1s">
            <p class="subtitle is-6">Scroll down to Learn More</p>
            <img class="animate__animated " src="./assets/icons/arrow.png" width="50px" height="50px"
                style="margin-bottom: 10px; filter: invert(1); transform: rotate(90deg) !important;">
        </div>
    </section>

    <section id="connectorHome" class="section">
    </section>

    <section id="homeabout" class="section animate__animated">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-6">
                    <figure class="image is-4by3">
                        <img class="is-rounded" src="./assets/images/hands.jpg" alt="Environmental Health">
                    </figure>
                </div>
                <div class="column is-6">
                    <h2 class="title is-2 is-spaced">About Us</h2>
                    <p class="subtitle is-4">
                        Health Advice Group is a non-profit organization that provides free health advice to everyone.
                        Our mission is to help people live healthier lives by providing them with the information they
                        need to make informed decisions about their health.
                    </p>
                    <a href="aboutus.php" class="button is-primary">Learn more</a>
                </div>
            </div>
        </div>
    </section>
    <section id="homepartners" class="section">
        <div class="container">
            <h2 class="title is-3 has-text-centered">Our Partners</h2>
            <div class="columns is-multiline is-centered">
                <div class="column is-4">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-5by2">
                                <img src="./assets/images/partner1.png" alt="Vertas Environmental">
                            </figure>
                        </div>
                        <div class="card-footer">
                            <a href="partners.php" class="card-footer-item">Learn more</a>
                            <a href="https://vertas.co.uk/company/vertas-environmental/" class="card-footer-item">Visit
                                website</a>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-5by2">
                                <img src="./assets/images/partner2.png" alt="MGS Environmental">
                            </figure>
                        </div>
                        <div class="card-footer">
                            <a href="partners.php" class="card-footer-item">Learn more</a>
                            <a href="https://www.mgs.co.uk/" class="card-footer-item">Visit website</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="homereviews" class="section">
        <div class="container">
            <h2 class="title is-2 has-text-centered">What the Customers Think</h2>
            <div class="columns is-multiline">
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media has-text-centered">
                                <div class="media-left">
                                    <figure class="image is-96x96">
                                        <img class="is-rounded" src="./assets/images/jonny.jpg" alt="Jonny Newton" />
                                    </figure>
                                </div>
                                <div class="media-content" style="margin-top: 20px; overflow: visible;">
                                    <p class="title is-3" style="white-space: nowrap;">Jonathan Newton</p>
                                    <p class="subtitle is-5" style="white-space: nowrap;">"PHP Mastermind"</p>
                                </div>
                            </div>
                            <div class="content">
                                This is some of the <strong>best</strong> health advice I've ever received. I
                                <strong>highly recommend</strong> Health
                                Advice Group to anyone looking to improve their health. Also, I actually don't know any
                                PHP.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media has-text-centered">
                                <div class="media-left">
                                    <figure class="image is-96x96">
                                        <img class="is-rounded" src="./assets/images/nathan.jpg" alt="Jonny Newton" />
                                    </figure>
                                </div>
                                <div class="media-content" style="margin-top: 20px; overflow: visible;">
                                    <p class="title is-3" style="white-space: nowrap;">Nathan Gallagher</p>
                                    <p class="subtitle is-5" style="white-space: nowrap;">"biggest nerd in gateshead"
                                    </p>
                                </div>
                            </div>
                            <div class="content">
                                I have <strong>never</strong> had a better experience than using this website. The
                                advice is <strong>top-notch</strong>
                                and I've been able to comfortably leave my home! <strong>Thank you</strong>, Health
                                Advice Group!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="card">
                        <div class="card-content">
                            <div class="media has-text-centered">
                                <div class="media-left">
                                    <figure class="image is-96x96">
                                        <img class="is-rounded" src="./assets/images/marcel.jpg" alt="Jonny Newton" />
                                    </figure>
                                </div>
                                <div class="media-content" style="margin-top: 20px; overflow: visible;">
                                    <p class="title is-3" style="white-space: nowrap;">Marcel Matz</p>
                                    <p class="subtitle is-5" style="white-space: nowrap;">"ChatGPT Power User"
                                    </p>
                                </div>
                            </div>
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

    <?php require './includes/footer.php'; ?>
    <script type="text/javascript" src="general.js"></script>
</body>

</html>