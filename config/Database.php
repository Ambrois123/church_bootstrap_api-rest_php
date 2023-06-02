<?php 

abstract class Database
{
    private static $pdo;

    private static function setBdd()
    {
        self::$pdo = new PDO('mysql:host=localhost;dbname=aegt_server;charset=utf8', 'root', '');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getConnection()
    {
        if(self::$pdo == null)
        {
            self::setBdd();
        }
        
        return self::$pdo;
    }
}
?>