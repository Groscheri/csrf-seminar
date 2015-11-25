<?php
// utils functions

function include_file($_folder, $_filename, $_type) {
    define('PHP', "php");
    define('JS', "js");
    
    $allowed_types = array('php', 'js');
    if (!in_array($_type, $allowed_types)) {
        return -1; // type not allowed
    }
    $path = dirname(__FILE__) . '/../' . $_folder . '/' . $_filename . '.' . $_type;
    
    if (file_exists($path)) {
        if ($_type == PHP) {
            require_once($path);
            return 0;
        }
        elseif ($_type == JS) {
            echo "<script type=\"text/javascript\" src=\"" . $path . "\"></script>";
            return 0;
        }
        return -1; // type not allowed
    }
    return -2; // file doesn't exist
}

?>
