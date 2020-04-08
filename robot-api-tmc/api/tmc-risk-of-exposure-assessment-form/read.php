<?php
    //HEADERS
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/tmc_risk_of_exposure_assessment_form.php';

    //Instantiate db & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate User Obj
    $tmc_exposure = new tmc_risk_of_exposure_assessment_form($db);

    //User Query
    $result = $tmc_exposure->read();
    //GET ROW COUNT
    $num = $result->rowCount();
    //Check if any users
    if($num > 0) {
        //init user array
        $tmc_exposure_arr = array();
        $tmc_exposure_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {    
            extract($row);

            $tmc_exposure_item = array(
                'id' => $id,
                'interviewerName' => $interviewerName,
                'interviewerDate' => $interviewerDate,
                'interviewerPhoneNumber' => $interviewerPhoneNumber,
                'isHistoryOfStayingWithConfirmed' => $isHistoryOfStayingWithConfirmed,
                'isHistoryofTravelingTogetherConfirmed' => $isHistoryofTravelingTogetherConfirmed,
                'workerLastName' => $workerLastName,
                'workerFirstName' => $workerFirstName,
                'workerAge' => $workerAge,
                'workerSex' => $workerSex,
                'workerCity' => $workerCity,
                'workerCountry' => $workerCountry,
                'workerContactDetails' => $workerContactDetails,
                'workerTypeOfPersonnel' => $workerTypeOfPersonnel,
                'workerFacilityUnitType' => $workerFacilityUnitType,
                'workerFirstExposureDate' => $workerFirstExposureDate,
                'healthCareFacility' => $healthCareFacility,
                'healthCareSetting' => $healthCareSetting,
                'healthCareCity' => $healthCareCity,
                'healthCareCountry' => $healthCareCountry,
                'hasMultipleCovidPatients' => $hasMultipleCovidPatients,
                'hasProvidedCareToCovidPatients' => $hasProvidedCareToCovidPatients,
                'hasFaceToFaceContactWithCovidPatients' => $hasFaceToFaceContactWithCovidPatients,
                'isPresentDuringAGP' => $isPresentDuringAGP,
                'typeOfAGP' => $typeOfAGP,
                'hasDirectContactWithCovidEnvironment' => $hasDirectContactWithCovidEnvironment,
                'typeOfFacilityCareIsAlsoProvided' => $typeOfFacilityCareIsAlsoProvided,
                'hasWornPPE' => $hasWornPPE,
                'frequencySingleGloves' => $frequencySingleGloves,
                'frequencyMedicalMask' => $frequencyMedicalMask,
                'frequencyFaceShield' => $frequencyFaceShield,
                'frequencyDisposableGown' => $frequencyDisposableGown,
                'frequencyRemoveAndReplacePPE' => $frequencyRemoveAndReplacePPE,
                'frequencyHandHygieneWhenTouchingPatient' => $frequencyHandHygieneWhenTouchingPatient,
                'frequencyHandHygieneAsepticProcedure' => $frequencyHandHygieneAsepticProcedure,
                'frequencyHandHygieneBodyFluidExposure' => $frequencyHandHygieneBodyFluidExposure,
                'frequencyHandHygienePatientEnvironment' => $frequencyHandHygienePatientEnvironment,
                'frequencyDecontaminationOfHighTouchSurfaces' => $frequencyDecontaminationOfHighTouchSurfaces,
                'ASP_hasWornPPE' => $ASP_hasWornPPE,
                'ASP_frequencySingleGloves' => $ASP_frequencySingleGloves,
                'ASP_frequencyN95Mask' => $ASP_frequencyN95Mask,
                'ASP_frequencyFaceShield' => $ASP_frequencyFaceShield,
                'ASP_frequencyDisposableGown' => $ASP_frequencyDisposableGown,
                'ASP_frequencyWaterproofApron' => $ASP_frequencyWaterproofApron,
                'ASP_frequencyRemoveAndReplacePPE' => $ASP_frequencyRemoveAndReplacePPE,
                'ASP_frequencyHHWhenTouchingPatient' => $ASP_frequencyHHWhenTouchingPatient,
                'ASP_frequencyHHAsepticProcedure' => $ASP_frequencyHHAsepticProcedure,
                'ASP_frequencyHHPatientEnvironment' => $ASP_frequencyHHPatientEnvironment,
                'ASP_frequencyDecontaminationOfHighTouchSurfaces' => $ASP_frequencyDecontaminationOfHighTouchSurfaces,
                'hasAccidentWithBiologicalSecretions' => $hasAccidentWithBiologicalSecretions,
                'typeOfBiologicalSecretionAccident' => $typeOfBiologicalSecretionAccident
            );

            //Push to data
            array_push($tmc_exposure_arr['data'],$tmc_exposure_item);
        }

        //turn it to json 
        echo json_encode($tmc_exposure_arr);

    } else {
        //no post
        echo json_encode(
            array('message' => 'No Result Found')
        );
    }
?>