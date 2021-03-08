<?php

//VOLUNTEER MANAGER
class Database {

    private static $dsn = 'mysql:host=localhost;dbname=volunteermanager';
    private static $username = 'root';
    private static $password = '';
    private static $db;

    public static function getDB() {

        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $errorMessage = $e->getMessage();
                include('databaseError.php');
                exit();
            }
        }
        return self::$db;
    }
}

?>
