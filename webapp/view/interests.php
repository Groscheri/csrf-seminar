<?php
// interests page

// check login
$logged = user::is_logged();
if (!$logged) {
    redirect("?p=connect&error=2");
    die();
}

if (isset($_GET['action'])) {
    // handle actions

    $action = $_GET['action'];
    if ($action == 'add') {
        if (!empty($_POST['name']) && isset($_POST['description'])) {
            $result = interest::add_and_bind_user($_POST['name'], $_POST['description'], $_SESSION['user']['id']);
            if ($result === false) {
                echo '<p>Impossible to add a new interest!</p>';
            }
            echo '<p>Interest has been created!</p>';
        }
    }
    elseif ($action == 'remove') {
        // TODO
    }
    else {
        // unknown action
    }

}
?>

<h2>Interests list</h2>

<?php

// list interests
$interests = interest::get_by_user($_SESSION['user']['id']);

if (!is_array($interests) || count($interests) == 0) {
?>
<p>No interest at the moment!</p>
<?php
}
else {
    echo '<ul>';
    foreach ($interests as $interest) {
        $id = $interest['id'];
        $name = $interest['name'];
        $description = $interest['description']; 
        echo '<li>' . $name . ': ' . $description . ' <a href=\'?p=interests&action=remove&id=' . $id . '\' title=\'Remove this interest\'>Remove</a></li>';    
    }
    echo '</ul>';
}
?>

<h3>Create new interest</h3>

<form method="POST" action="?p=interests&action=add">
<label for="name">Name: </label><input type="text" name="name" id="name" /><br />
<label for="description">Description: </label><br />
<textarea name="description" placeholder="Description optional"></textarea>
<br />
<input type="submit" value="Create interest" />
</form>
