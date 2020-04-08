<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/tmc_risk_of_exposure_assessment_form.php';

    //Instantiate db & connect
    $database = new Database();
    $db = $database->connect();
    //Instantiate User Obj
    $tmc_risk_of_exposure = new tmc_risk_of_exposure_assessment_form($db);

    //GET RAW POSTED DATA
    $data = json_decode(file_get_contents("php://input"));

    $tmc_risk_of_exposure->interviewerName = $data->interviewerName;
    $tmc_risk_of_exposure->interviewerDate = $data->interviewerDate;
    $tmc_risk_of_exposure->interviewerPhoneNumber = $data->interviewerPhoneNumber;
    $tmc_risk_of_exposure->isHistoryOfStayingWithConfirmed = $data->isHistoryOfStayingWithConfirmed;
    $tmc_risk_of_exposure->isHistoryofTravelingTogetherConfirmed = $data->isHistoryofTravelingTogetherConfirmed;
    $tmc_risk_of_exposure->workerLastName = $data->workerLastName;
    $tmc_risk_of_exposure->workerFirstName = $data->workerFirstName;
    $tmc_risk_of_exposure->workerAge = $data->workerAge;
    $tmc_risk_of_exposure->workerSex = $data->workerSex;
    $tmc_risk_of_exposure->workerCity = $data->workerCity;
    $tmc_risk_of_exposure->workerCountry = $data->workerCountry;
    $tmc_risk_of_exposure->workerContactDetails = $data->workerContactDetails;
    $tmc_risk_of_exposure->workerTypeOfPersonnel = $data->workerTypeOfPersonnel;
    $tmc_risk_of_exposure->workerFacilityUnitType = $data->workerFacilityUnitType;
    $tmc_risk_of_exposure->workerFirstExposureDate = $data->workerFirstExposureDate;
    $tmc_risk_of_exposure->healthCareFacility = $data->healthCareFacility;
    $tmc_risk_of_exposure->healthCareSetting = $data->healthCareSetting;
    $tmc_risk_of_exposure->healthCareCity = $data->healthCareCity;
    $tmc_risk_of_exposure->healthCareCountry = $data->healthCareCountry;
    $tmc_risk_of_exposure->hasMultipleCovidPatients = $data->hasMultipleCovidPatients;
    $tmc_risk_of_exposure->hasProvidedCareToCovidPatients = $data->hasProvidedCareToCovidPatients;
    $tmc_risk_of_exposure->hasFaceToFaceContactWithCovidPatients = $data->hasFaceToFaceContactWithCovidPatients;
    $tmc_risk_of_exposure->isPresentDuringAGP = $data->isPresentDuringAGP;
    $tmc_risk_of_exposure->typeOfAGP = $data->typeOfAGP;
    $tmc_risk_of_exposure->hasDirectContactWithCovidEnvironment = $data->hasDirectContactWithCovidEnvironment;
    $tmc_risk_of_exposure->typeOfFacilityCareIsAlsoProvided = $data->typeOfFacilityCareIsAlsoProvided;
    $tmc_risk_of_exposure->hasWornPPE = $data->hasWornPPE;
    $tmc_risk_of_exposure->frequencySingleGloves = $data->frequencySingleGloves;
    $tmc_risk_of_exposure->frequencyMedicalMask = $data->frequencyMedicalMask;
    $tmc_risk_of_exposure->frequencyFaceShield = $data->frequencyFaceShield;
    $tmc_risk_of_exposure->frequencyDisposableGown = $data->frequencyDisposableGown;
    $tmc_risk_of_exposure->frequencyRemoveAndReplacePPE = $data->frequencyRemoveAndReplacePPE;
    $tmc_risk_of_exposure->frequencyHandHygieneWhenTouchingPatient = $data->frequencyHandHygieneWhenTouchingPatient;
    $tmc_risk_of_exposure->frequencyHandHygieneAsepticProcedure = $data->frequencyHandHygieneAsepticProcedure;
    $tmc_risk_of_exposure->frequencyHandHygieneBodyFluidExposure = $data->frequencyHandHygieneBodyFluidExposure;
    $tmc_risk_of_exposure->frequencyHandHygienePatientEnvironment = $data->frequencyHandHygienePatientEnvironment;
    $tmc_risk_of_exposure->frequencyDecontaminationOfHighTouchSurfaces = $data->frequencyDecontaminationOfHighTouchSurfaces;
    $tmc_risk_of_exposure->ASP_hasWornPPE = $data->ASP_hasWornPPE;
    $tmc_risk_of_exposure->ASP_frequencySingleGloves = $data->ASP_frequencySingleGloves;
    $tmc_risk_of_exposure->ASP_frequencyN95Mask = $data->ASP_frequencyN95Mask;
    $tmc_risk_of_exposure->ASP_frequencyFaceShield = $data->ASP_frequencyFaceShield;
    $tmc_risk_of_exposure->ASP_frequencyDisposableGown = $data->ASP_frequencyDisposableGown;
    $tmc_risk_of_exposure->ASP_frequencyWaterproofApron = $data->ASP_frequencyWaterproofApron;
    $tmc_risk_of_exposure->ASP_frequencyRemoveAndReplacePPE = $data->ASP_frequencyRemoveAndReplacePPE;
    $tmc_risk_of_exposure->ASP_frequencyHHWhenTouchingPatient = $data->ASP_frequencyHHWhenTouchingPatient;
    $tmc_risk_of_exposure->ASP_frequencyHHAsepticProcedure = $data->ASP_frequencyHHAsepticProcedure;
    $tmc_risk_of_exposure->ASP_frequencyHHPatientEnvironment = $data->ASP_frequencyHHPatientEnvironment;
    $tmc_risk_of_exposure->ASP_frequencyDecontaminationOfHighTouchSurfaces = $data->ASP_frequencyDecontaminationOfHighTouchSurfaces;
    $tmc_risk_of_exposure->hasAccidentWithBiologicalSecretions = $data->hasAccidentWithBiologicalSecretions;
    $tmc_risk_of_exposure->typeOfBiologicalSecretionAccident = $data->typeOfBiologicalSecretionAccident;

    //create user

    if($tmc_risk_of_exposure->create()){
        echo json_encode(
            array('message' => 'Patient Data Created in Exposure Form')
        );
    } else {
        echo json_encode(
            array('message' => 'Patient Data Not Created in Exposure Form')
        );
    }