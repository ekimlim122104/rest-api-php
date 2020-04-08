<?php
    //HEADERS
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/tmc_contact_tracing_linelist.php';

    //Instantiate db & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate User Obj
    $tmc_case_linelist = new tmc_contact_tracing_linelist($db);

    //User Query
    $result = $tmc_case_linelist->read();
    //GET ROW COUNT
    $num = $result->rowCount();
    //Check if any users
    if($num > 0) {
        //init user array
        $tmc_case_linelist_arr = array();
        $tmc_case_linelist_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {    
            extract($row);

            $tmc_case_linelist_item = array(
                'id' => $id,
                'timestamp' => $timestamp,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'gender' => $gender,
                'homeDepartment' => $homeDepartment,
                'contactNumber' => $contactNumber,
                'completeAddress' => $completeAddress,
                'dateOfExposure' => $dateOfExposure,
                'ppeUsed' => $ppeUsed,
                'locationOfExposure' => $locationOfExposure,
                'describeExposure' => $describeExposure,
                'isWearingFaceMask' => $isWearingFaceMask,
                'profession' => $profession,
                'lengthOfExposure' => $lengthOfExposure,
            );

            //Push to data
            array_push($tmc_case_linelist_arr['data'],$tmc_case_linelist_item);
        }

        //turn it to json 
        echo json_encode($tmc_case_linelist_arr);

    } else {
        //no post
        echo json_encode(
            array('message' => 'No Result Found')
        );
    }
?>