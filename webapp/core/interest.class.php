<?php
// interest class

class interest {
    public static function get($_id) {
        $sql = 'SELECT `name`, `description` FROM `interests` WHERE `id` = :id';
        $params = array('id' => $_id);
        try {
            return DB::Prepare($sql, $params, DB::FETCH_TYPE_ALL);
        }
        catch (Exception $e) {
            return -1;
        }
    }

    public static function add($_name, $_description = '') {
        $sql = 'INSERT INTO `interests` (`name`, `description`) VALUES (:name, :description)';
        $params = array('name'        => $_name,
                        'description' => $_description);
        try {
            return DB::Prepare($sql, $params);
        }
        catch (Exception $e) {
            return false;
        }
    }
}
?>
