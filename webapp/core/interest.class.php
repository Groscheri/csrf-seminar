<?php
// interest class

class interest {
    public static function all() {
        $sql = 'SELECT `id`, `name`, `description` FROM `interests`';
        $params = array();
        try {
            return DB::Prepare($sql, $params, DB::FETCH_TYPE_ALL);
        }
        catch (Exception $e) {
            return -1;
        }
    }

    public static function get_by_user($_user_id) {
        $sql = 'SELECT i.`id`, i.`name`, i.`description` FROM `interests` i, `users_interests` ui WHERE ui.`user_id` = :user_id AND ui.`interest_id` = i.`id`;';
        $params = array('user_id' => $_user_id);
        try {
            return DB::Prepare($sql, $params, DB::FETCH_TYPE_ALL);
        }
        catch (Exception $e) {
            return -1;
        }
    }

    public static function get($_id) {
        $sql = 'SELECT `id`, `name`, `description` FROM `interests` WHERE `id` = :id';
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
            DB::Prepare($sql, $params);
            return DB::last_insert_id();
        }
        catch (Exception $e) {
            return false;
        }
    }

    public static function add_and_bind_user($_name, $_description, $_user_id) {
        $id = self::add($_name, $_description);
        if ($id === false) {
            return false;
        }
        return self::bind_user($id, $_user_id);
    }

    public static function bind_user($_id, $_user_id) {
        $sql = 'INSERT INTO `users_interests` (`interest_id`, `user_id`) VALUES (:id, :user_id);';
        $params = array('id'      => $_id,
                        'user_id' => $_user_id);
        try {
            return DB::Prepare($sql, $params);
        }
        catch (Exception $e) {
            return false;
        }
    }

    public static function unbind_user($_id, $_user_id) {
        $sql = 'DELETE FROM `users_interests` WHERE `user_id` = :user_id AND `interest_id` = :id';
        $params = array('id'      => $_id,
                        'user_id' => $_user_id);
        try {
            DB::Prepare($sql, $params);
            return true;
        }
        catch (Exception $e) {
            return false;
        }
    }
}
?>
