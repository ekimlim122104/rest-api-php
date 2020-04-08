<?php
    //HEADERS
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/tmc_case_investigation_form.php';

    //Instantiate db & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate User Obj
    $tmc_case_investigation = new tmc_case_investigation_form($db);

    //User Query
    $result = $tmc_case_investigation->read();
    //GET ROW COUNT
    $num = $result->rowCount();
    //Check if any users
    if($num > 0) {
        //init user array
        $tmc_case_investigation_arr = array();
        $tmc_case_investigation_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {    
            extract($row);

            $tmc_case_investigation_item = array(
                'id' => $id,
                'diseaseReportUnit' => $diseaseReportUnit,
                'nameOfInvestigator' => $nameOfInvestigator,
                'dateOfInterview' => $dateOfInterview,
                'lastName' => $lastName,
                'firstName' => $firstName,
                'middleName' => $middleName,
                'birthday' => $birthday,
                'age' => $age,
                'Gender' => $Gender,
                'occupation' => $occupation,
                'civilStatus' => $civilStatus,
                'nationality' => $nationality,
                'passportNumber' => $passportNumber,
                'houseNumber' => $houseNumber,
                'street' => $street,
                'municipality' => $municipality,
                'province' => $province,
                'region' => $region,
                'homePhoneNumber' => $homePhoneNumber,
                'cellphoneNumber' => $cellphoneNumber,
                'emailAddress' => $emailAddress,
                'ofw_employersName' => $ofw_employersName,
                'ofw_occupation' => $ofw_occupation,
                'ofw_placeOfWork' => $ofw_placeOfWork,
                'ofw_HouseNumber' => $ofw_HouseNumber,
                'ofw_Street' => $ofw_Street,
                'ofw_municipality' => $ofw_municipality,
                'ofw_province' => $ofw_province,
                'ofw_country' => $ofw_country,
                'ofw_officePhoneNumber' => $ofw_officePhoneNumber,
                'ofw_cellphoneNumber' => $ofw_cellphoneNumber,
                'hasHistoryOfTravel' => $hasHistoryOfTravel,
                'portOfExit' => $portOfExit,
                'airline' => $airline,
                'flightNumber' => $flightNumber,
                'dateOfDeparture' => $dateOfDeparture,
                'dateOfArrival' => $dateOfArrival,
                'hasHistoryOfExposure' => $hasHistoryOfExposure,
                'dateOfContactWithCovid19' => $dateOfContactWithCovid19,
                'clinicalStatusAtTimeOfReport' => $clinicalStatusAtTimeOfReport,
                'dateOfOnsetOfIllness' => $dateOfOnsetOfIllness,
                'dateOfAdmission' => $dateOfAdmission,
                'fever' => $fever,
                'hasCough' => $hasCough,
                'hasSoreThroat' => $hasSoreThroat,
                'hasColds' => $hasColds,
                'hasShortnesOfBreathing' => $hasShortnesOfBreathing,
                'otherSymptoms' => $otherSymptoms,
                'hasHistoryOfOtherIllness' => $hasHistoryOfOtherIllness,
                'otherIllnessSpecify' => $otherIllnessSpecify,
                'ischestXrayDone' => $ischestXrayDone,
                'chestXrayDate' => $chestXrayDate,
                'isPregnant' => $isPregnant,
                'pregnantLMP' => $pregnantLMP,
                'cxrResultsPneumonia' => $cxrResultsPneumonia,
                'otherRadiologicFindings' => $otherRadiologicFindings,
                'isSerum' => $isSerum,
                'serumDateCollected' => $serumDateCollected,
                'serumDateSentToRITM' => $serumDateSentToRITM,
                'serumDateReceivedInRITM' => $serumDateReceivedInRITM,
                'serumVirusIsolationResult' => $serumVirusIsolationResult,
                'serumPCRResult' => $serumPCRResult,
                'isOropharyngeal' => $isOropharyngeal,
                'oropharyngealDateCollected' => $oropharyngealDateCollected,
                'oropharyngealDateSentToRITM' => $oropharyngealDateSentToRITM,
                'oropharyngealDateReceivedInRITM' => $oropharyngealDateReceivedInRITM,
                'oropharyngealVirusIsolationResult' => $oropharyngealVirusIsolationResult,
                'oropharyngealPCRResult' => $oropharyngealPCRResult,
                'isOthers' => $isOthers,
                'othersDateCollected' => $othersDateCollected,
                'othersDateSentToRITM' => $othersDateSentToRITM,
                'othersDateReceivedInRITM' => $othersDateReceivedInRITM,
                'othersVirusIsolationResult' => $othersVirusIsolationResult,
                'othersPCRResult' => $othersPCRResult,
                'finalClassification' => $finalClassification,
                'dateOfDischarge' => $dateOfDischarge,
                'conditionOfDischarge' => $conditionOfDischarge,
                'nameOfInformant' => $nameOfInformant,
                'informantRelationship' => $informantRelationship,
                'informantPhoneNumber' => $informantPhoneNumber
            );

            //Push to data
            array_push($tmc_case_investigation_arr['data'],$tmc_case_investigation_item);
        }

        //turn it to json 
        echo json_encode($tmc_case_investigation_arr);

    } else {
        //no post
        echo json_encode(
            array('message' => 'No Result Found')
        );
    }
?>