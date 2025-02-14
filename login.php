<?php

session_start();
require './includes/url.php';
require './includes/auth.php';
require './includes/database.php';

if (isLoggedIn()) {
    redirect("/");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getDB();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            if ($user && password_verify($password, $user['password'])) {
                session_regenerate_id(true);
                $_SESSION['isLoggedIn'] = true;
                $_SESSION['firstname'] = $user['firstname'];
                $_SESSION['lastname'] = $user['lastname'];
                $_SESSION['username'] = $user['username'];
                if ($user['isAdmin']) {
                    $_SESSION['adminLoggedIn'] = true;
                }
                redirect("/");
                exit;
            } else {
                $error = "Incorrect username or password.";
            }
        } else {
            echo mysqli_error($conn);
        }
    }
    $_POST = [];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Log In | Health Advice Group</title>
    <link rel="stylesheet" href="bulma.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
            <div class="container">
                <h1 class="title is-1 has-text-centered animate__animated animate__flipInX animate__delay-1s"
                    style="text-shadow: 2px 2px 4px rgba(20, 22, 26, 0.5);">
                    Log In
                </h1>
                <div class="columns is-centered">
                    <div class="column is-7-tablet is-6-desktop is-5-widescreen">
                        <form method="POST" class="box animate__animated animate__fadeIn">
                            <div class="field">
                                <label for="username" class="label">Username</label>
                                <div class="control has-icons-left">
                                    <input type="text" id="username" name="username" placeholder="e.g. johndoe123" class="input"
                                        required autocomplete="username">
                                    <span class="icon is-small is-left">
                                        <i class="far fa-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input type="password" id="password" name="password" placeholder="*******" class="input" required autocomplete="current-password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <button type="submit" class="button is-success is-fullwidth">
                                    Log In
                                </button>
                                <a href="login.php?recoverpass=1"
                                    style="margin-top: 10px; text-decoration: underline;">Forgot Password?</a>
                            </div>
                            <?php if (isset($error)): ?>
                                <p class="has-text-danger">
                                    <?= $error ?>
                                </p>
                            <?php endif; ?>
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

    <?php require 'includes/footer.php'; ?>
    <script type="text/javascript" src="general.js"></script>
</body>

</html>