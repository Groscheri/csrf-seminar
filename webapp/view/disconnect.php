<?php
// disconnection page
user::disconnect();

if (isset($_GET['delete'])) {
    redirect("?p=connect&delete");
}
else {
    redirect("?p=connect&disconnected");
}
die();
?>
