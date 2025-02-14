<?php

session_start();
require './includes/auth.php';
require './includes/url.php';

if (!isLoggedIn()) {
    redirect("/login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard | Health Advice Group</title>
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

        .activeSelection {
            display: inline;
            transition: all 0.1s ease;
            transform: scale(1.05);
        }
    </style>
</head>

<body class="has-navbar-fixed-top">
    <?php require 'includes/navbar.php'; ?>

    <section class="hero is-fullheight-with-navbar has-background lightBackground">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class=" columns is-multiline is-centered">
                    <div class="column is-full">
                        <div class="card animate__animated animate__fadeInDown">
                            <div class="card-content" style="overflow-x: auto;">
                                <div id="daySelector"
                                    class="is-flex is-flex-wrap-nowrap is-flex-direction-row is-justify-content-center"
                                    style="min-width: max-content;">
                                    <div id="day1" class="is-clickable"
                                        style="width: 80px; margin-left: 50px; margin-right: 50px; flex-shrink: 0;">
                                        <h1 class="title is-1">Mo</h1>
                                        <hr>
                                    </div>
                                    <div id="day2" class="is-clickable"
                                        style="width: 80px; margin-right: 50px; flex-shrink: 0;">
                                        <h1 class="title is-1">Tu</h1>
                                        <hr>
                                    </div>
                                    <div id="day3" class="is-clickable"
                                        style="width: 80px; margin-right: 50px; flex-shrink: 0;">
                                        <h1 class="title is-1">We</h1>
                                        <hr>
                                    </div>
                                    <div id="day4" class="is-clickable" style="width: 80px; flex-shrink: 0;">
                                        <h1 class="title is-1">Th</h1>
                                        <hr>
                                    </div>
                                    <div id="day5" class="is-clickable"
                                        style="width: 80px; margin-left: 50px; flex-shrink: 0;">
                                        <h1 class="title is-1">Fr</h1>
                                        <hr>
                                    </div>
                                    <div id="day6" class="is-clickable"
                                        style="width: 80px; margin-left: 50px; flex-shrink: 0;">
                                        <h1 class="title is-1">Sa</h1>
                                        <hr>
                                    </div>
                                    <div id="day7" class="is-clickable"
                                        style="width: 80px; margin-left: 50px; margin-right: 50px; flex-shrink: 0;">
                                        <h1 class="title is-1">Su</h1>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-full">
                        <div class="card animate__animated animate__fadeInRight">
                            <div class="card-content" style="overflow-x: auto;">
                                <div id="timeSelector"
                                    class="is-flex is-flex-wrap-nowrap is-flex-direction-row is-justify-content"
                                    style="min-width: max-content;">
                                    <div id="time00" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">12am</h1>
                                        <hr>
                                    </div>
                                    <div id="time01" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">1am</h1>
                                        <hr>
                                    </div>
                                    <div id="time02" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">2am</h1>
                                        <hr>
                                    </div>
                                    <div id="time03" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">3am</h1>
                                        <hr>
                                    </div>
                                    <div id="time04" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">4am</h1>
                                        <hr>
                                    </div>
                                    <div id="time05" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">5am</h1>
                                        <hr>
                                    </div>
                                    <div id="time06" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">6am</h1>
                                        <hr>
                                    </div>
                                    <div id="time07" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">7am</h1>
                                        <hr>
                                    </div>
                                    <div id="time08" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">8am</h1>
                                        <hr>
                                    </div>
                                    <div id="time09" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">9am</h1>
                                        <hr>
                                    </div>
                                    <div id="time10" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">10am</h1>
                                        <hr>
                                    </div>
                                    <div id="time11" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">11am</h1>
                                        <hr>
                                    </div>
                                    <div id="time12" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">12pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time13" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">1pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time14" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">2pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time15" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">3pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time16" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">4pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time17" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">5pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time18" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">6pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time19" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">7pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time20" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">8pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time21" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">9pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time22" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">10pm</h1>
                                        <hr>
                                    </div>
                                    <div id="time23" class="is-clickable"
                                        style="width: 70px; margin-right: 25px; flex-shrink: 0;">
                                        <h1 class="title is-4">11pm</h1>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-one-third">
                        <div class="card animate__animated animate__fadeInLeft">
                            <div class="card-content">
                                <div class="content">
                                    <h2 class="title is-1">Advice for You</h2>
                                    <p id="time-warning" class="has-text-danger has-text-weight-semibold"></p>
                                    <div id="advice-result">
                                        <progress class="progress is-small is-primary" max="100">Working...</progress>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-two-third">
                        <div class="card animate__animated animate__fadeInLeft">
                            <div class="card-content">
                                <div class="content">
                                    <h2 class="title is-1">Weather Info</h2>
                                    <p id="weather-result">
                                        <progress class="progress is-small is-primary" max="100">Working...</progress>
                                    </p>
                                    <p id="weather-error" class="has-text-danger"></p>
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
    <script type="text/javascript" src="weather.js"></script>
</body>

</html>