<?php

use function PHPSTORM_META\map;

require_once('../database/dbpatients.php');

$patientDB = new DBPatients();
header('Content-Type: application/json');

if(sizeof($_POST) <= 1){

    $result = [];
    $result['types'] = [];
    $result['values'] = [];

    $patientsQuery = $patientDB->getPatientsWithInsurance();

    while($patient = $patientsQuery->fetch()){

        if(!in_array($patient['type'], $result['types'])){
            array_push($result['types'], $patient['type']);
            array_push($result['values'], ['type' => $patient['type'], 'value' => 0]);
        }

        for($i = 0; $i < sizeof($result['values']); $i++){
            if(strcmp($result['values'][$i]['type'], $patient['type'])){
                $result['values'][$i]['value']++;
            }
        }

    }



    echo json_encode($result);
    
}
