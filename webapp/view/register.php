<?php
// register page

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];

    if ($password !== $password2) {
        redirect("?p=register&error=1");
    }

    $registered = user::register($login, $password, $email);
    if ($registered) {
        redirect("?p=connect");
    }
    else {
        redirect("?p=register&error=1");
    }
    die();
}
else {
    // display registration form
?>

<h2>Registration</h2>

<?php
if (isset($_GET['error'])) {
?>
<p>Impossible to create an account with these settings!</p>
<?php
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
