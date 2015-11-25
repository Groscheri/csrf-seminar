<?php
    require_once dirname(__FILE__) . '/core/utils.inc.php';
    $ret = include_file('view', 'index', 'php');

    if ($ret != 0) {
        echo "Webapp not available at the moment. We apologize for that issue.";
    }
?>
