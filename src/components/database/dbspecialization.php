<?php

require_once('dbconfig.php');
require_once('dbconnection.php');

final class DBSpecialization
{

    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function getSpecializationById($id)
    {

        $table = DBConfig::SPECIALIZATION_TABLE;
        $sql = <<<EOSQL
        SELECT * FROM $table WHERE specialization_id == $id;
        EOSQL;

        return $this->connection->sendQuery($sql);
    }

    public function getSpecializations(){

        $table = DBConfig::SPECIALIZATION_TABLE;
        

        $sql = <<<EOSQL
        SELECT * FROM $table
        EOSQL;

        return $this->connection->sendQuery($sql);

    }

}