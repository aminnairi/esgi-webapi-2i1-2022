<?php

class Database
{
    public static function getConnection()
    {
        $driver = "mysql";
        $databaseName = "esgi-webapi-2022-2i1";
        $host = "localhost";
        $dsn = "$driver:dbname=$databaseName;host=$host";
        $user = "root";
        $password = "root";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

        /** @see https://www.php.net/manual/en/pdo.construct.php */
        $databaseConnection = new PDO($dsn, $user, $password, $options);

        return $databaseConnection;
    }
}

