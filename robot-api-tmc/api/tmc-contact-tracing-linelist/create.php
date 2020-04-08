<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/tmc_contact_tracing_linelist.php';

    //Instantiate db & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate User Obj
    $tmc_tracinglinelist = new tmc_contact_tracing_linelist($db);

    //GET RAW POSTED DATA
    $data = json_decode(file_get_contents("php://input"));

    $tmc_tracinglinelist->firstName = $data->firstName;
    $tmc_tracinglinelist->lastName = $data->lastName;
    $tmc_tracinglinelist->gender = $data->gender;
    $tmc_tracinglinelist->homeDepartment = $data->homeDepartment;
    $tmc_tracinglinelist->contactNumber = $data->contactNumber;
    $tmc_tracinglinelist->completeAddress = $data->completeAddress;
    $tmc_tracinglinelist->dateOfExposure = $data->dateOfExposure;
    $tmc_tracinglinelist->ppeUsed = $data->ppeUsed;
    $tmc_tracinglinelist->locationOfExposure = $data->locationOfExposure;
    $tmc_tracinglinelist->describeExposure = $data->describeExposure;
    $tmc_tracinglinelist->isWearingFaceMask = $data->isWearingFaceMask;
    $tmc_tracinglinelist->profession = $data->profession;
    $tmc_tracinglinelist->lengthOfExposure = $data->lengthOfExposure;


    //create user

    if($tmc_tracinglinelist->create()){
        echo json_encode(
            array('message' => 'Patient Data Created in Linelist Form')
        );
    } else {
        echo json_encode(
            array('message' => 'Patient Data Not Created in Lineoist Form')
        );
    }