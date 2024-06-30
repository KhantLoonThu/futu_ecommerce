<?php

namespace Config;

use PDO;

class Database
{
    private static $connection;

    public static function connect()
    {
        return self::$connection = new PDO("mysql:host=localhost;dbname=e_futu;", "root", "");
    }

    public static function disconnect()
    {
        return self::$connection = null;
    }
}
