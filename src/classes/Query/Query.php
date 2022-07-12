<?php

class Query extends Connection
{

    private static $conn;

    public function __construct()
    {
        self::$conn = new Connection;
        $this->openconn = self::$conn->openConnection();
    }

    public function execute($sql)
    {
        try {
            $this->stmt = $this->openconn->prepare($sql);
            $this->stmt->execute();
            $this->arr = array();
            self::$conn->closeConnection();
            while ($row = $this->stmt->fetchAll(PDO::FETCH_ASSOC)) {
                $this->arr = $row;
            }
            return $this->arr;
        } catch (PDOException $e) {
            return $e;
        }
    }
}
