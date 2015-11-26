<?php
// register page
if (user::is_logged()) {
    redirect('?p=interests');
}

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];

    if ($password !== $password2) {
        redirect("?p=register&error=3"); // not same password
    }

    $registered = user::register($login, $password, $email);
    if ($registered == 0) {
        redirect("?p=connect");
    }
    elseif ($registered == -2) {
        redirect("?p=register&error=2"); // duplication
    }
    else {
        redirect("?p=register&error=1"); // unknown error
    }
    die();
}
else {
    // display registration form
?>

<h2>Registration</h2>

<?php
if (isset($_GET['error'])) {
    $code = intval($_GET['error']);
    $message = '';

    if ($code == 1) {
        // unknown
        $message = 'Impossible to create an account with these settings!';
    }
    elseif ($code == 2) {
        // duplication
        $message = 'This login has already been taken!';
    }
    elseif ($code == 3) {
        // not same password
        $message = 'Passwords are not the same!';
    }
    echo '<p>' . $message . '</p>';
}
?>

<form method="POST" action="">
    <label for="login">Login: </label><input type="text" name="login" id="login" />
    <br />
    <label for="password">Password: </label><input type="password" name="password" id="password" />
    <br />
    <label for="password2">Re-type password: </label><input type="password" name="password2" id="password2" />
    <br />
    <label for="email">Email: </label><input type="text" name="email" id="email" />
    <br />
    Return to <a href="?p=connect" title="Connection">login page</a> or <input type="submit" value="Register" />
</form>

<?php
}
?>
