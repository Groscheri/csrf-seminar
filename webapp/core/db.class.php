<?php

class DB {
    /*
    DB class in order to connect to MySQL
    */
    
    const FETCH_TYPE_ROW = 0;
    const FETCH_TYPE_ALL = 1;

    protected $connection;
    protected static $instance;

    protected function __construct() {
        // constructor
        try {
            /*
            Because project is only local, we don't need to hide or encrypt this 
            configuration's information
            */
            $host = 'localhost';
            $port = 3306;
            $dbname = 'csrf';
            $dbuser = 'csrf';
            $dbpass = 'csrfpass!';
            $dburl = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbname . '';
            $this->connection = new PDO($dburl, $dbuser, $dbpass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8;'));
        } catch (Exception $e) {
            throw new Exception('DB : Incorrect parameters');
        }
    }

    public static function getConnection() {
        // retrieve connection
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance->connection;
    }

    public static function &Prepare($_query, $_params = array(), $_fetchType = self::FETCH_TYPE_ROW) {
        if (!is_object(self::getConnection())) {
            return false;
        }

        $statement = self::getConnection()->prepare($_query);
        $result = NULL;

        if ($statement != false && $statement->execute($_params) != false) {
            if ($_fetchType == self::FETCH_TYPE_ROW) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
            }
            else {
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        }

        if ($result == '') {
            $result = true;
        }

        $error = $statement->errorInfo();
        $code = $error[0];

        if ($code != 0000) {
            throw new Exception('[MySQL] Error code: ' . $code . ' (' . $error[1] . ') ' . $error[2] . "\n on " . $_query . "\n with parameters: " . print_r($_params, true) . '', $error[1]);
        }
        return $result;
    }

}

?>
