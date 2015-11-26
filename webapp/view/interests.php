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

<?php

// list interests
$interests = interest::get($_SESSION['user']['id']);

if (!is_array($interests) || count($interests) == 0) {
?>
<p>No interest at the moment!</p>
<?php
}

echo '<ul>';
foreach ($interests as $interest) {
    $name = $interest['name'];
    $description = $interest['description']; 
    echo '<li>' . $name . ': ' . $description . '</li>';    
}
echo '</ul>';

// TODO add interest
// with multiselect

?>
