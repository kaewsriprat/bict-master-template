<?php

class Connection
{

    private static $conn;

    public function openConnection()
    {
        if (!isset(self::$conn)) {
            if (DRIVER == 'MSSQL') {
                self::$conn = new PDO("sqlsrv:server=" . HOST . "; Database=" . DB, UID, PASSWORD);
            } elseif (DRIVER == 'MySQL') {
                try {
                    self::$conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, UID, PASSWORD);
                } catch (PDOException $e) {
                    return false;
                }
            } else {
                return "ERROR: undefined or wrong driver";
            }
        }
        return self::$conn;
    }

    public function closeConnection()
    {
        self::$conn = null;
    }

    public function showConnection()
    {
        if (self::$conn) {
            return true;
        } else {
            return false;
        }
    }
}
