<?php
    //HEADERS
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/tmc_case_investigation_form.php';

    //Instantiate db & connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate User Obj
    $tmc_case_investigation = new tmc_case_investigation_form($db);

    //GET RAW POSTED DATA
    $data = json_decode(file_get_contents("php://input"));

    $tmc_case_investigation->diseaseReportUnit = $data->diseaseReportUnit;
    $tmc_case_investigation->nameOfInvestigator = $data->nameOfInvestigator;
    $tmc_case_investigation->dateOfInterview = $data->dateOfInterview;
    $tmc_case_investigation->lastName = $data->lastName;
    $tmc_case_investigation->firstName = $data->firstName;
    $tmc_case_investigation->middleName = $data->middleName;
    $tmc_case_investigation->birthday = $data->birthday;
    $tmc_case_investigation->age = $data->age;
    $tmc_case_investigation->Gender = $data->Gender;
    $tmc_case_investigation->occupation = $data->occupation;
    $tmc_case_investigation->civilStatus = $data->civilStatus;
    $tmc_case_investigation->nationality = $data->nationality;
    $tmc_case_investigation->passportNumber = $data->passportNumber;
    $tmc_case_investigation->houseNumber = $data->houseNumber;
    $tmc_case_investigation->street = $data->street;
    $tmc_case_investigation->municipality = $data->municipality;
    $tmc_case_investigation->province = $data->province;
    $tmc_case_investigation->region = $data->region;
    $tmc_case_investigation->homePhoneNumber = $data->homePhoneNumber;
    $tmc_case_investigation->cellphoneNumber = $data->cellphoneNumber;
    $tmc_case_investigation->emailAddress = $data->emailAddress;
    $tmc_case_investigation->ofw_employersName = $data->ofw_employersName;
    $tmc_case_investigation->ofw_occupation = $data->ofw_occupation;
    $tmc_case_investigation->ofw_placeOfWork = $data->ofw_placeOfWork;
    $tmc_case_investigation->ofw_HouseNumber = $data->ofw_HouseNumber;
    $tmc_case_investigation->ofw_Street = $data->ofw_Street;
    $tmc_case_investigation->ofw_municipality = $data->ofw_municipality;
    $tmc_case_investigation->ofw_province = $data->ofw_province;
    $tmc_case_investigation->ofw_country = $data->ofw_country;
    $tmc_case_investigation->ofw_officePhoneNumber = $data->ofw_officePhoneNumber;
    $tmc_case_investigation->ofw_cellphoneNumber = $data->ofw_cellphoneNumber;
    $tmc_case_investigation->hasHistoryOfTravel = $data->hasHistoryOfTravel;
    $tmc_case_investigation->portOfExit = $data->portOfExit;
    $tmc_case_investigation->airline = $data->airline;
    $tmc_case_investigation->flightNumber = $data->flightNumber;
    $tmc_case_investigation->dateOfDeparture = $data->dateOfDeparture;
    $tmc_case_investigation->dateOfArrival = $data->dateOfArrival;
    $tmc_case_investigation->hasHistoryOfExposure = $data->hasHistoryOfExposure;
    $tmc_case_investigation->dateOfContactWithCovid19 = $data->dateOfContactWithCovid19;
    $tmc_case_investigation->clinicalStatusAtTimeOfReport = $data->clinicalStatusAtTimeOfReport;
    $tmc_case_investigation->dateOfOnsetOfIllness = $data->dateOfOnsetOfIllness;
    $tmc_case_investigation->dateOfAdmission = $data->dateOfAdmission;
    $tmc_case_investigation->fever = $data->fever;
    $tmc_case_investigation->hasCough = $data->hasCough;
    $tmc_case_investigation->hasSoreThroat = $data->hasSoreThroat;
    $tmc_case_investigation->hasColds = $data->hasColds;
    $tmc_case_investigation->hasShortnesOfBreathing = $data->hasShortnesOfBreathing;
    $tmc_case_investigation->otherSymptoms = $data->otherSymptoms;
    $tmc_case_investigation->hasHistoryOfOtherIllness = $data->hasHistoryOfOtherIllness;
    $tmc_case_investigation->otherIllnessSpecify = $data->otherIllnessSpecify;
    $tmc_case_investigation->ischestXrayDone = $data->ischestXrayDone;
    $tmc_case_investigation->chestXrayDate = $data->chestXrayDate;
    $tmc_case_investigation->isPregnant = $data->isPregnant;
    $tmc_case_investigation->pregnantLMP = $data->pregnantLMP;
    $tmc_case_investigation->cxrResultsPneumonia = $data->cxrResultsPneumonia;
    $tmc_case_investigation->otherRadiologicFindings = $data->otherRadiologicFindings;
    $tmc_case_investigation->isSerum = $data->isSerum;
    $tmc_case_investigation->serumDateCollected = $data->serumDateCollected;
    $tmc_case_investigation->serumDateSentToRITM = $data->serumDateSentToRITM;
    $tmc_case_investigation->serumDateReceivedInRITM = $data->serumDateReceivedInRITM;
    $tmc_case_investigation->serumVirusIsolationResult = $data->serumVirusIsolationResult;
    $tmc_case_investigation->serumPCRResult = $data->serumPCRResult;
    $tmc_case_investigation->isOropharyngeal = $data->isOropharyngeal;
    $tmc_case_investigation->oropharyngealDateCollected = $data->oropharyngealDateCollected;
    $tmc_case_investigation->oropharyngealDateSentToRITM = $data->oropharyngealDateSentToRITM;
    $tmc_case_investigation->oropharyngealDateReceivedInRITM = $data->oropharyngealDateReceivedInRITM;
    $tmc_case_investigation->oropharyngealVirusIsolationResult = $data->oropharyngealVirusIsolationResult;
    $tmc_case_investigation->oropharyngealPCRResult = $data->oropharyngealPCRResult;
    $tmc_case_investigation->isOthers = $data->isOthers;
    $tmc_case_investigation->othersDateCollected = $data->othersDateCollected;
    $tmc_case_investigation->othersDateSentToRITM = $data->othersDateSentToRITM;
    $tmc_case_investigation->othersDateReceivedInRITM = $data->othersDateReceivedInRITM;
    $tmc_case_investigation->othersVirusIsolationResult = $data->othersVirusIsolationResult;
    $tmc_case_investigation->othersPCRResult = $data->othersPCRResult;
    $tmc_case_investigation->finalClassification = $data->finalClassification;
    $tmc_case_investigation->dateOfDischarge = $data->dateOfDischarge;
    $tmc_case_investigation->conditionOfDischarge = $data->conditionOfDischarge;
    $tmc_case_investigation->nameOfInformant = $data->nameOfInformant;
    $tmc_case_investigation->informantRelationship = $data->informantRelationship;
    $tmc_case_investigation->informantPhoneNumber = $data->informantPhoneNumber;

    //create user

    if($tmc_case_investigation->create()){
        echo json_encode(
            array('message' => 'Patient Data Created in Investigation Form')
        );
    } else {
        echo json_encode(
            array('message' => 'Patient Data Not Created in Investigation Form')
        );
    }