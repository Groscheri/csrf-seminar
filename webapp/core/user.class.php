<?php
// user class

class user {

    public static function login($_login, $_password) {
        // TODO

        // retrieve hash for `$_login` user with SQL query
        // return self::check_password($hash, $_password)
        return false;
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
