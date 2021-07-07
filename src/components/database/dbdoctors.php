<?php

require_once('dbconfig.php');
require_once('dbconnection.php');

final class DBDoctors
{

    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function getDoctorById($id)
    {

        $table = DBConfig::DOCTOR_TABLE;
        $sql = <<<EOSQL
        SELECT * FROM $table WHERE doctor_id == $id;
        EOSQL;

        return $this->connection->sendQuery($sql);
    }

    public function getDoctorsByInstitutionId($id){

        $doctor_table = DBConfig::DOCTOR_TABLE;
        $values = array(
            ':institution_id' => $id
        );

        $sql = <<<EOSQL
        SELECT * FROM $doctor_table as d
            WHERE d.institution_id = :institution_id
        EOSQL;

        return $this->connection->sendQueryWithValues($sql, $values);

    }

    public function getDoctorsBySpecializationId($id){

        $doctor_table = DBConfig::DOCTOR_TABLE;
        $values = array(
            ':specialization_id' => $id
        );

        $sql = <<<EOSQL
        SELECT * FROM $doctor_table as d
            WHERE d.specialization_id = :specialization_id
        EOSQL;

        return $this->connection->sendQueryWithValues($sql, $values);
    }

    public function getDoctors(){
        $table = DBConfig::DOCTOR_TABLE;
        $sql = <<<EOSQL
        SELECT * FROM $table
        EOSQL;

        return $this->connection->sendQuery($sql);
    }

    public function getDoctorsWithSpecificData(){
        $doctor_table = DBConfig::DOCTOR_TABLE;
        $institution_table = DBConfig::HEALTH_INSTITUTION_TABLE;
        $specialization_table = DBConfig::SPECIALIZATION_TABLE;

        $sql = <<<EOSQL
        SELECT d.OIB, d.name, d.surname, i.name as 'institution', s.name as 'specialization'
            FROM $doctor_table as d, $institution_table as i, $specialization_table as s
            WHERE d.institution_id = i.institution_id AND d.specialization_id = s.specialization_id
        EOSQL;

        return $this->connection->sendQuery($sql);
    }

}
