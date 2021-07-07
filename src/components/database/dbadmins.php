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

    public function getAdminsPassById($adminId)
    {
        $table = DBConfig::ADMIN_TABLE;
        $sql = <<<EOSQL
        SELECT pass FROM $table WHERE id = $adminId;
        EOSQL;

        $query = $this->connection->sendQuery($sql);

        try {
            $row = $query->fetch();
            if (!empty($row["pass"])) {
                return $row["pass"];
            } else {
                return false;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAdminsIdByEmail($email)
    {

        $query = $this->getAdminsByEmail($email);

        try {
            $row = $query->fetch();
            if ($row["email"] != "" && $row["email"] == $email) {
                return $row["id"];
            } else {
                return -1;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return -1;
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


    public function updatePassword($email, $newPassword, $token)
    {

        $query = $this->getAdminsByEmail($email);

        try {
            $row = $query->fetch();
            if (password_verify($row["pass"] . $row["id"], $token)) {

                $table = DBConfig::ADMIN_TABLE;

                $values = array(
                    ':newPassword' => password_hash($newPassword, PASSWORD_DEFAULT),
                    ':id' => $row["id"],
                );

                /* testing password reset with no hashing
                $values = array(
                    ':newPassword' => $newPassword,
                    ':id' => $row["id"],
                );
                */

                $sql = <<<EOSQL
                UPDATE $table SET pass = :newPassword WHERE id = :id;
                EOSQL;

                $this->connection->sendQueryWithValues($sql, $values);

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
