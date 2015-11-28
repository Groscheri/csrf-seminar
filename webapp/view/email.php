<?php
// manage email page

// check login
$logged = user::is_logged();
if (!$logged) {
    redirect("?p=connect&error=2");
    die();
}

if (isset($_GET['ok'])) {
    echo '<p>Mail has been successfuly changed!</p>';
}

if (!empty($_POST['email'])) {
    $result = user::change_email($_SESSION['user']['id'], $_POST['email']);
    if ($result) {
        redirect('?p=email&ok');
        die();
    }
    else {
        echo '<p>Impossible to change email!</p>';
    }
}

?>

<h2>Change email</h2>

<form method="POST">
<label for="email">New email: </label><input type="text" name="email" id="email" /> &nbsp; <input type="submit" value="Change email" />
</form>
