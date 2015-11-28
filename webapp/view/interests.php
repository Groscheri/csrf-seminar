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
        if (!empty($_POST['name']) && !empty($_POST['csrf_token']) && isset($_POST['description'])) {
            $token = $_POST['csrf_token'];
            $valid = csrf::check_signed_token($token);
            if ($valid) {
                $result = interest::add_and_bind_user($_POST['name'], $_POST['description'], $_SESSION['user']['id']);
                if ($result === false) {
                    echo '<p>Impossible to add a new interest!</p>';
                }
                else {
                    echo '<p>Interest has been created!</p>';
                }
            }
            else {
                echo '<p>Wrong CSRF token!</p>';
            }
        }
    }
    elseif ($action == 'remove') {
        if (!empty($_GET['id'])) {
            $result = interest::unbind_user($_GET['id'], $_SESSION['user']['id']);
            if (!$result) {
                echo '<p>Impossible to remove this interest!</p>';
            }
            else {
                echo '<p>Interest has been removed!</p>';
            }
        }
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
<input type="hidden" name="csrf_token" value="<?php echo csrf::generate_signed_token(); ?>" />
<label for="name">Name: </label><input type="text" name="name" id="name" /><br />
<label for="description">Description: </label><br />
<textarea name="description" placeholder="Description optional"></textarea>
<br />
<input type="submit" value="Create interest" />
</form>
