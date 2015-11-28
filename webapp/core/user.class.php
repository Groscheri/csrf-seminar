<?php
// user class

class user {

    public static function login($_login, $_password) {
        // retrieve hash for `$_login` user with SQL query
        $user = DB::Prepare("SELECT `id`, `login`, `password`, `email` FROM users WHERE `login` = :login;", array('login' => $_login));

        if (!is_array($user)) {
            return false;
        }

        $hash = $user['password'];
        if (self::check_password($hash, $_password)) {
            // store session
            $_SESSION = array();
            $_SESSION['logged'] = true;
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

            // remove password from $user
            unset($user['password']);
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public static function disconnect() {
        // destroy session
        if (isset($_SESSION)) {
            $_SESSION = array();
            unset($_SESSION);
            session_unset();
            session_destroy();
        }
        return true;
    }

    public static function register($_login, $_password, $_email) {
        // check user information
        
        // hash password
        $hash = self::hash_password($_password);
        
        // insert user in database
        $sql = 'INSERT INTO `users` (`login`, `password`, `email`) VALUES (:login, :password, :email)';
        $params = array('login'    => $_login,
                        'password' => $hash,
                        'email'    => $_email);

        // execute & handle error (duplication, ...)
        try {
            $result = DB::Prepare($sql, $params);
        }
        catch (Exception $e) {
            $code = $e->getCode();

            if ($code == 1062) {
                // duplication
                return -2;
            }
            return -1;
        }
        return 0;
    }

    public static function is_logged() {
        if (isset($_SESSION['logged'])) {
            return $_SESSION['logged'];
        }
        return false;
    }

    public static function change_email($_id, $_email) {
        $email = htmlentities($_email);
        $sql = 'UPDATE `users` SET `email` = :email WHERE `id` = :id';
        $params = array('id'    => $_id,
                        'email' => $email);
        try {
            DB::Prepare($sql, $params);
            $_SESSION['user']['email'] = $email;
            return true;
        }
        catch (Exception $e) {
            return false;
        }     
    }

    private static function check_password($hash, $_password) {
        // check password using password_verify builtin function
        return password_verify($_password, $hash);
    }

    private static function hash_password($_password) {
        // hash password using bcrypt
        return password_hash($_password, PASSWORD_BCRYPT);
    }

}
?>
