<?php

require_once('dbconfig.php');

final class DBConnection
{

    private $conn;
    static private $instance = null;

    public static function getInstance()
    {
        if (self::$instance == null) self::$instance = new self();
        return self::$instance;
    }

    private function __construct()
    {
        $connStr = sprintf("mysql:host=%s;dbname=%s;charset=utf8mb4", DBConfig::HOST, DBConfig::DB_NAME);

        try {
            $this->conn = new PDO($connStr, DBConfig::USERNAME, DBConfig::PASS);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function __destruct()
    {
        self::$instance = null;
        $this->conn = null;
    }

    public function sendQuery($sql)
    {
        $query = $this->conn->prepare($sql);

        try {
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function sendQueryWithValues($sql, $values)
    {
        $query = $this->conn->prepare($sql);

        try {
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute($values);
            return $query;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getLastInsertedId()
    {
        return $this->conn->lastInsertId();
    }
};
