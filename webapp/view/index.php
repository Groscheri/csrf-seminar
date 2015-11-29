<?php
    // import useful functions
    session_start();
    require_once dirname(__FILE__) . '/../core/utils.inc.php';
    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>CSRF seminar - Internet Security &amp; Privacy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="CSRF seminar - Internet Security & Privacy">
        <meta name="author" content="David Kufa & Quentin Lemaire">
    </head>

    <body>
        <header>
            <h1>CSRF seminar - List of interests</h1>
        </header>

        <?php
            $logged = user::is_logged();
            if ($logged) {
                $login = $_SESSION['user']['login'];
                $email = $_SESSION['user']['email'];
        ?>
            <p>
            Welcome <strong><?php echo $login; ?></strong> (<?php echo $email; ?>)!
            </p>
            <p>
            You can take a look at your <a href="?p=interests" title="list of interests">list of interests</a> and update it at your convenience or <a href='?p=disconnect' title='Disconnection'>disconnect</a> from the platform.
            </p>
            <p>
            You can also <a href="?p=account&action=email" title="Change email">change your email</a> if you want. This email will be used to change your password if you lose it.
            </p>
        <?php
            }
        ?>

        <div class="content">
            <?php
                $action = 'connect'; // default action
                if (isset($_GET['p'])) {
                    $action = $_GET['p'];
                }

                // corresponding to files in "view" folder
                $allowed_actions = array('connect', 'disconnect', 'interests', 'register', 'account');

                if (in_array($action, $allowed_actions)) {
                    $ret = include_file('view', $action, 'php');
                    ob_end_flush();
                    if ($ret != 0) {
                        echo "<p>Page not available at the moment !</p>";
                    }
                }
                else {
                    echo "<p>Page not found !</p>";
                }
            ?>
        </div>

        <br />
        <hr />
        <footer>
            <center>
                <p><small>CSRF Seminar - David KUFA &amp; Quentin LEMAIRE <?php if ($logged) { echo' - <a href="?p=account&action=delete" title="Delete account">Delete account</a>'; } ?> - Copyright &copy; <?php echo date('Y'); ?></small></p>
            </center>
        </footer>
    </body>
</html>
