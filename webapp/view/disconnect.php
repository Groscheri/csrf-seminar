<?php
// disconnection page
user::disconnect();
redirect("?p=connect&disconnected");
die();
?>
