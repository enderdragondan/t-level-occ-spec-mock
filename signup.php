<?php

session_start();
require "./includes/url.php";
require "./includes/auth.php";
require "./includes/database.php";

if (isLoggedIn()) {
    redirect("/");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = getDB();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $securityQ = (int) $_POST['securityQ'];
    $securityA = $_POST['securityA'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {

        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            $error = "Username is taken. Try again.";
        } elseif ($password !== $password2) {
            $error = "Passwords did not match. Try again.";
        } else {
            $sql = "INSERT INTO users (firstname, lastname, username, password, question, answer) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if ($stmt === false) {
                echo mysqli_error($conn);
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $securityHash = password_hash($securityA, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssssis", $firstname, $lastname, $username, $hash, $securityQ, $securityHash);
                if (mysqli_stmt_execute($stmt)) {
                    redirect("/login.php");
                    exit;
                } else {
                    echo mysqli_error($conn);
                }
            }
        }
    }
    $_POST = [];
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up | Health Advice Group</title>
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
                    Sign Up
                </h1>
                <div class="columns is-centered">
                    <div class="column is-7-tablet is-6-desktop is-5-widescreen">
                        <form method="POST" class="box animate__animated animate__fadeIn">
                            <div class="field">
                                <label for="firstname" class="label">First Name</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="firstname" id="firstname" placeholder="e.g. John" class="input" required
                                        minlength="2" maxlength="64">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="lastname" class="label">Last Name</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="lastname" id="lastname" placeholder="e.g. Doe" class="input" required
                                        minlength="2" maxlength="64">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="username" class="label">Username</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="username" id="username" placeholder="e.g. johndoe123" class="input"
                                        minlength="3" maxlength="16" required autocomplete="username">
                                    <span class="icon is-small is-left">
                                        <i class="far fa-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <div class="control has-icons-left">
                                    <input type="password" name="password" id="password" placeholder="*******" class="input"
                                        minlength="8" maxlength="64" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="password2" class="label">Confirm Password</label>
                                <div class="control has-icons-left">
                                    <input type="password" name="password2" id="password2" placeholder="*******" class="input" required
                                        minlength="8" maxlength="64">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="securityQ" class="label">Security Question</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="securityQ" id="securityQ" required>
                                            <option value="" disabled selected>Select a security question</option>
                                            <option value="1">What is your mother's maiden name?</option>
                                            <option value="2">What is the name of your first pet?</option>
                                            <option value="3">What is the name of the city you were born in?</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="securityA" class="label">Security Answer</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="securityA" id="securityA" placeholder="Type your answer..." class="input"
                                        required minlength="3" maxlength="64" autocomplete="off">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-question"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <button type="submit" class="button is-info is-fullwidth">
                                    Sign Up
                                </button>
                            </div>
                            <?php if (isset($error)): ?>
                                <div class="field">
                                    <p class="help is-danger">
                                        <?php echo $error; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                            <hr>
                            <div class="field">
                                <a class="button is-fullwidth" href="login.php">
                                    Already have an account? Log In
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