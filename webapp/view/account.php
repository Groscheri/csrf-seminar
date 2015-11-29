<?php
// manage email page

// check login
$logged = user::is_logged();
if (!$logged) {
    redirect("?p=connect&error=2");
    die();
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action == 'email') {
        if (isset($_GET['ok'])) {
            // email change successful
            echo '<p style="color:green;">Mail has been successfuly changed!</p>';
        }
        elseif (!empty($_POST['email'])) {
            // email change request
            $result = user::change_email($_SESSION['user']['id'], $_POST['email']);
            if ($result) {
                redirect('?p=account&action=email&ok');
                die();
            }
            else {
                echo '<p>Impossible to change email!</p>';
            }
        }
    }
    elseif ($action == 'delete') {
        if (!empty($_POST['csrf_token'])) {
            $token = $_POST['csrf_token'];
            $valid = csrf::check($token, $_SESSION['token']);
            if ($valid) {
                $result = user::delete($_SESSION['user']['id']);
                if ($result) {
                    redirect('?p=disconnect&delete');
                    die();
                }
                else {
                    echo '<p>Impossible to delete this account!</p>';
                }
            }
            else {
                echo '<p style="color:red;">Wrong CSRF token!</p>';
            }
        }
    }
    else {
        // unknown action
    }
}

?>

<h2>Change email</h2>

<form method="POST" action="?p=account&action=email">
<label for="email">New email: </label><input type="text" name="email" id="email" /> &nbsp; <input type="submit" value="Change email" />
</form>

<h2>Delete account</h2>

<form method="POST" action="?p=account&action=delete">
<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['token']; ?>" />
<input type="submit" value="I'm sure I want to delete my account" />
</form>
