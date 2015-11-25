<?php
// user class

class user {

    public static function login($_login, $_password) {
        // retrieve hash for `$_login` user with SQL query
        $user = DB::Prepare("SELECT `login`, `password` FROM users WHERE `login` = :login;", array('login' => $_login));

        if (!is_array($user)) {
            return false;
        }

        $hash = $user['password'];
        if (self::check_password($hash, $_password)) {
            // store session
            $_SESSION = array();
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
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
        // TODO
        echo "Registrating...\n";
        echo $_login . ' / ' . $_password . ' / ' . $_email;

        // check user information
        // hash password
        $hash = self::hash_password($_password);
        print $hash;
        // insert user in database
        // handle error (duplication, ...)
        return false;
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
