<?php
// connection page

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $connected = user::login($login, $password);

    if ($connected) {
        redirect('?p=interests');
    }
    else {
        redirect("?p=connect&error=1");
    }
    die();
}
else {
    // display form
?>

<h2>Authentication</h2>

<?php
if (isset($_GET['error'])) {
    $error = intval($_GET['error']);
    $message = 'Wrong login/password combination!';

    if ($error == 2) {
        $message = 'You must be connected to access this page!';
    }

    echo '<p>' . $message . '</p>';
}
?>

<?php
if (isset($_GET['disconnected'])) {
?>
<p>You have been successfully disconnected!</p>
<?php
}
?>

<form method="POST" action="">
    <label for="login">Login: </label><input type="text" name="login" id="login" />
    <br />
    <label for="password">Password: </label><input type="password" name="password" id="password" />
    <br />
    New visitor ? Just <a href="?p=register" title="Registration">register</a> or <input type="submit" value="Connect" />
</form>

<?php
}
?>
