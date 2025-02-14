<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require './includes/auth.php';
require './includes/database.php';
require './includes/url.php';

if (!isLoggedIn()) {
    redirect("/login.php");
    exit;
}

$conn = getDB();

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt === false) {
    echo mysqli_error($conn);
} else {
    mysqli_stmt_bind_param($stmt, "s", $username);
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
    } else {
        echo mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    $hayFever = (int)$_POST['hayFever'];
    $asthma = (int)$_POST['asthma'];
    $heart = (int)$_POST['heart'];
    $heat = (int)$_POST['heat'];
    $cold = (int)$_POST['cold'];
    $skin = (int)$_POST['skin'];
    $migraines = (int)$_POST['migraines'];
    $jointPain = (int)$_POST['jointPain'];
    $dustMold = (int)$_POST['dustMold'];
    $heatstroke = (int)$_POST['heatstroke'];

    $sql = "UPDATE users SET hayFever = ?, asthma = ?, heart = ?, heat = ?, cold = ?, skin = ?, migraines = ?, jointPain = ?, dustMold = ?, heatstroke = ? WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "iiiiiiiiiis", $hayFever, $asthma, $heart, $heat, $cold, $skin, $migraines, $jointPain, $dustMold, $heatstroke, $username);
        if (mysqli_stmt_execute($stmt)) {
            redirect("/");
            exit;
        } else {
            echo mysqli_error($conn);
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Preferences | Health Advice Group</title>
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

    <section class="hero is-fullheight-with-navbar">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h2 class="title is-1 has-text-centered animate__animated animate__fadeIn"
                    style="text-shadow: 2px 2px 4px rgba(20, 22, 26, 0.5);">Preferences</h2>
                <div class="columns is-centered">
                    <div class="column is-6">
                        <form method="POST" class="box animate__animated animate__fadeIn">
                            <div class="field">
                                <label for="hayFever" class="label">Do you have hay fever or seasonal allergies?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="hayFever" required>
                                            <?php if ($user['hayFever']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="asthma" class="label">Do you have asthma or other respiratory
                                    conditions?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="asthma" required>
                                            <?php if ($user['asthma']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="heart" class="label">Do you have any heart-related conditions?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="heart" required>
                                            <?php if ($user['heart']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="heat" class="label">Are you sensitive to extreme heat?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="heat" required>
                                            <?php if ($user['heat']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="cold" class="label">Are you sensitive to extreme cold?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="cold" required>
                                            <?php if ($user['cold']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="skin" class="label">Do you have any skin conditions that worsen in certain
                                    weather (e.g., eczema)?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="skin" required>
                                            <?php if ($user['skin']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="migraines" class="label">Do you experience migraines triggered by
                                    environmental changes?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="migraines" required>
                                            <?php if ($user['migraines']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="jointPain" class="label">Do you have joint pain or arthritis that worsens in
                                    cold or damp weather?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="jointPain" required>
                                            <?php if ($user['jointPain']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="dustMold" class="label">Are you allergic to dust or mold?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="dustMold" required>
                                            <?php if ($user['dustMold']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="heatstroke" class="label">Do you have a history of heatstroke or dehydration
                                    in hot weather?</label>
                                <div class="control">
                                    <div class="select is-fullwidth">
                                        <select name="heatstroke" required>
                                            <?php if ($user['heatstroke']): ?>
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            <?php else: ?>
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="field">
                                <button type="submit" name="save" class="button is-success is-fullwidth">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require './includes/footer.php'; ?>
    <script type="text/javascript" src="general.js"></script>
</body>

</html>