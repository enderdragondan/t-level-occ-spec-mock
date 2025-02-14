<?php

session_start();
require './includes/url.php';
require './includes/auth.php';
require './includes/database.php';

if (!isAdmin()) {
    redirect("/");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmdelete'])) {
    $conn = getDB();

    $username = $_POST['delusername'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $sql = "DELETE FROM users WHERE username = ?";
                $stmt = mysqli_prepare($conn, $sql);
                if ($stmt === false) {
                    echo mysqli_error($conn);
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    if (mysqli_stmt_execute($stmt)) {
                        $delsuccess = "Account deleted successfully.";
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            } else {
                $delerror = "Account not found.";
            }
        } else {
            echo mysqli_error($conn);
        }
    }
    $_POST = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmgrant'])) {
    $conn = getDB();

    $username = $_POST['grantusername'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $sql = "UPDATE users SET isAdmin = 1 WHERE username = ?";
                $stmt = mysqli_prepare($conn, $sql);
                if ($stmt === false) {
                    echo mysqli_error($conn);
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    if (mysqli_stmt_execute($stmt)) {
                        $grantsuccess = "Admin permissions granted successfully.";
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            } else {
                $granterror = "Account not found.";
            }
        } else {
            echo mysqli_error($conn);
        }
    }
    $_POST = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmrevoke'])) {
    $conn = getDB();

    $username = $_POST['revokeusername'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);
            if ($user) {
                $sql = "UPDATE users SET isAdmin = 0 WHERE username = ?";
                $stmt = mysqli_prepare($conn, $sql);
                if ($stmt === false) {
                    echo mysqli_error($conn);
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $username);
                    if (mysqli_stmt_execute($stmt)) {
                        $revokesuccess = "Admin permissions revoked successfully.";
                    } else {
                        echo mysqli_error($conn);
                    }
                }
            } else {
                $revokeerror = "Account not found.";
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
    <title>Admin Panel | Health Advice Group</title>
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

    <section class="hero is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1 has-text-centered animate__animated animate__flipInX animate__delay-1s"
                    style="text-shadow: 2px 2px 4px rgba(20, 22, 26, 0.5);">
                    Admin Panel
                </h1>
                <div class="columns is-centered">
                    <div class="column is-7-tablet is-6-desktop is-5-widescreen">
                        <form method="POST" class="box animate__animated animate__fadeIn">
                            <div class="field">
                                <label for="delusername" class="label">Delete an Account</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="delusername" placeholder="e.g. johndoe123" class="input">
                                    <span class="icon is-small is-left">
                                        <i class="far fa-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <button type="submit" name="confirmdelete" class="button is-danger is-fullwidth">
                                    Confirm Deletion
                                </button>
                            </div>
                            <?php if (isset($delerror)): ?>
                                <p class="has-text-danger">
                                    <?= $delerror ?>
                                </p>
                            <?php elseif (isset($delsuccess)): ?>
                                <p class="has-text-success">
                                    <?= $delsuccess ?>
                                </p>
                            <?php endif; ?>
                            <hr>
                            <div class="field">
                                <label for="grantusername" class="label">Grant an Account Admin Permissions</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="grantusername" placeholder="e.g. johndoe123" class="input">
                                    <span class="icon is-small is-left">
                                        <i class="far fa-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <button type="submit" name="confirmgrant" class="button is-success is-fullwidth">
                                    Grant Admin Permissions
                                </button>
                            </div>
                            <?php if (isset($granterror)): ?>
                                <p class="has-text-danger">
                                    <?= $granterror ?>
                                </p>
                            <?php elseif (isset($grantsuccess)): ?>
                                <p class="has-text-success">
                                    <?= $grantsuccess ?>
                                </p>
                            <?php endif; ?>
                            <hr>
                            <div class="field">
                                <label for="revokeusername" class="label">Grant an Account Admin Permissions</label>
                                <div class="control has-icons-left">
                                    <input type="text" name="revokeusername" placeholder="e.g. johndoe123"
                                        class="input">
                                    <span class="icon is-small is-left">
                                        <i class="far fa-user-circle"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="field">
                                <button type="submit" name="confirmrevoke" class="button is-warning is-fullwidth">
                                    Revoke Admin Permissions
                                </button>
                            </div>
                            <?php if (isset($revokeerror)): ?>
                                <p class="has-text-danger">
                                    <?= $revokeerror ?>
                                </p>
                            <?php elseif (isset($revokesuccess)): ?>
                                <p class="has-text-success">
                                    <?= $revokesuccess ?>
                                </p>
                            <?php endif; ?>
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