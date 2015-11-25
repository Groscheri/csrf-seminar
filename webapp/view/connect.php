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
?>
<p>Wrong login/password combination!</p>
<?php
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
