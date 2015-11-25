<?php
// utils functions

function include_file($_folder, $_filename, $_type) {
    define('PHP', 'php');
    define('JS', 'js');
    
    $allowed_types = array(PHP, JS, 'class');
    if (!in_array($_type, $allowed_types)) {
        return -1; // type not allowed
    }

    $filename = $_filename;
    $folder = $_folder;
    $type = $_type;
    if ($_type == 'class') {
        $filename = $_filename . '.class';
        $type = PHP;
    }

    $path = dirname(__FILE__) . '/../' . $folder . '/' . $filename . '.' . $type;
    
    if (file_exists($path)) {
        if ($type == PHP) {
            require_once($path);
            return 0;
        }
        elseif ($type == JS) {
            echo "<script type=\"text/javascript\" src=\"" . $path . "\"></script>";
            return 0;
        }
        return -1; // type not allowed
    }
    return -2; // file doesn't exist
}

include_file('core', 'db', 'class'); // include DB
include_file('core', 'user', 'class'); // include user

?>
