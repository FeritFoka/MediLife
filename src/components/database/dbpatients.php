<?php

require_once('dbconfig.php');
require_once('dbconnection.php');

final class DBPatients
{

    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function getPatientsWithInsurance()
    {

        $patient_table = DBConfig::PATIENT_TABLE;
        $insurance_table = DBConfig::HEALTH_INSURANCE_TABLE;

        $sql = <<<EOSQL
        SELECT p.name, p.surname, p.OIB, p.sex, i.type
            FROM $patient_table as p, $insurance_table as i
            WHERE p.insurance_id = i.health_insurance_id;
        EOSQL;

        return $this->connection->sendQuery($sql);
    }

}
