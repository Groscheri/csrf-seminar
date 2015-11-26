<?php
// interests page

// check login
$logged = user::is_logged();
if (!$logged) {
    redirect("?p=connect&error=2");
    die();
}
?>

<h2>Interests list</h2>

<!-- TODO -->
