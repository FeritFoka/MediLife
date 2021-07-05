<?php

require_once('dbconfig.php');
require_once('dbconnection.php');

final class DBAdmins
{

    private $connection;

    public function __construct()
    {
        $this->connection = DBConnection::getInstance();
    }

    public function getAdminsByEmail($email)
    {

        $table = DBConfig::ADMIN_TABLE;
        $sql = <<<EOSQL
        SELECT * FROM $table WHERE email like "$email";
        EOSQL;

        return $this->connection->sendQuery($sql);
    }

    public function checkIfLoginIsValid($email, $password)
    {

        $query = $this->getAdminsByEmail($email);

        try {
            $row = $query->fetch();
            if (password_verify($password, $row["pass"])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }

    public function checkIfEmailInDatabase($email)
    {

        $query = $this->getAdminsByEmail($email);

        try {
            $row = $query->fetch();
            if ($row["email"] != "" && $row["email"] == $email) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return false;
    }
}
