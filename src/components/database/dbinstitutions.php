<?php

require_once('dbconfig.php');
require_once('dbconnection.php');

final class DBInstitutions
{

    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function getInstitutionById($id)
    {

        $table = DBConfig::HEALTH_INSTITUTION_TABLE;
        $sql = <<<EOSQL
        SELECT * FROM $table WHERE institution_id == $id;
        EOSQL;

        return $this->connection->sendQuery($sql);
    }

    public function getInstitutions(){

        $table = DBConfig::HEALTH_INSTITUTION_TABLE;

        $sql = <<<EOSQL
        SELECT * FROM $table
        EOSQL;

        return $this->connection->sendQuery($sql);

    }

}