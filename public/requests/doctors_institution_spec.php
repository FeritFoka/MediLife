<?php

require_once("../../src/components/database/dbdoctors.php");

$doctorDB = new DBDoctors();
header('Content-Type: application/json');

if (sizeof($_POST) <= 1) {

    $result = [];

    $doctorsQuery = $doctorDB->getDoctorsWithSpecificData();


    while ($doctor = $doctorsQuery->fetch()) {
        array_push($result, $doctor);
    }

    echo json_encode($result);
}
