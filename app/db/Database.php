<?php

class Database {

    private static $instance = NULL;

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    public static function instance() {
        if (!isset(self::$instance)) {
            //The PDO_MYSQL Data Source Name (DSN) 
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            try {
                self::$instance = new PDO($dsn, DB_USER, DB_PASS, $pdo_options);
            } catch (PDOException $e) {
                echo "ERROR: " . $e->getMessage();
            }
        }
        return self::$instance;
    }

}
