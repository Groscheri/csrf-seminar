<?php
    // import useful functions
    require_once dirname(__FILE__) . '/../core/utils.inc.php';
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

        <div class="content">
            <?php
                $action = 'connect'; // default action
                if (isset($_GET['p'])) {
                    $action = $_GET['p'];
                }

                // corresponding to files in "view" folder
                $allowed_actions = array('connect', 'disconnect', 'interests', 'register');

                if (in_array($action, $allowed_actions)) {
                    $ret = include_file('view', $action, 'php');
                    if ($ret != 0) {
                        echo "Page not available at the moment !";
                    }
                }
                else {
                    echo "Page not found !";
                }
            ?>
        </div>
    </body>
</html>
