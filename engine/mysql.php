<?php 
class Mysql {
    public static $mysql_connect = false;
    public function __construct() { 
        if(self::$mysql_connect) return self::$mysql_connect;
        self::$mysql_connect = new PDO('mysql:host=' . $config['mysql_host'] . ';dbname=' . $config['mysql_database'], $config['mysql_user'], $config['mysql_pass']); 
        return self::$mysql_connect;
    }
} 
?>