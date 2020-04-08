<?php
    class tmc_risk_of_exposure_assessment_form {
        //DB STFUFF
        private $conn;
        private $table = "`tmc risk of exposure assessment form`";

        //properties of tmc risk of exposure assessment form col
        public $id;
        public $interviewerName;
        public $interviewerDate;
        public $interviewerPhoneNumber;
        public $isHistoryOfStayingWithConfirmed;
        public $isHistoryofTravelingTogetherConfirmed;
        public $workerLastName;
        public $workerFirstName;
        public $workerAge;
        public $workerSex;
        public $workerCity;
        public $workerCountry;
        public $workerContactDetails;
        public $workerTypeOfPersonnel;
        public $workerFacilityUnitType;
        public $workerFirstExposureDate;
        public $healthCareFacility;
        public $healthCareSetting;
        public $healthCareCity;
        public $healthCareCountry;
        public $hasMultipleCovidPatients;
        public $hasProvidedCareToCovidPatients;
        public $hasFaceToFaceContactWithCovidPatients;
        public $isPresentDuringAGP;
        public $typeOfAGP;
        public $hasDirectContactWithCovidEnvironment;
        public $typeOfFacilityCareIsAlsoProvided;
        public $hasWornPPE;
        public $frequencySingleGloves;
        public $frequencyMedicalMask;
        public $frequencyFaceShield;
        public $frequencyDisposableGown;
        public $frequencyRemoveAndReplacePPE;
        public $frequencyHandHygieneWhenTouchingPatient;
        public $frequencyHandHygieneAsepticProcedure;
        public $frequencyHandHygieneBodyFluidExposure;
        public $frequencyHandHygienePatientEnvironment;
        public $frequencyDecontaminationOfHighTouchSurfaces;
        public $ASP_hasWornPPE;
        public $ASP_frequencySingleGloves;
        public $ASP_frequencyN95Mask;
        public $ASP_frequencyFaceShield;
        public $ASP_frequencyDisposableGown;
        public $ASP_frequencyWaterproofApron;
        public $ASP_frequencyRemoveAndReplacePPE;
        public $ASP_frequencyHHWhenTouchingPatient;
        public $ASP_frequencyHHAsepticProcedure;
        public $ASP_frequencyHHPatientEnvironment;
        public $ASP_frequencyDecontaminationOfHighTouchSurfaces;
        public $hasAccidentWithBiologicalSecretions;
        public $typeOfBiologicalSecretionAccident;

        //Constructor with DB
        public function __construct($db){
            $this->conn = $db;
        }

        //GET USER
        public function read(){
            //CREATE QUERY
            $query = 'SELECT * FROM '. $this->table .'';
            //PREPARED STATEMENT
            $stmt = $this->conn->prepare($query);
            //EXECUTE QUERY
            $stmt->execute();
            return $stmt;
        }

        //CREATE
        public function create(){
            //Create query
            $query = 'INSERT INTO '.
            $this->table.' 
            SET 
            interviewerName = :interviewerName,
            interviewerDate = :interviewerDate,
            interviewerPhoneNumber = :interviewerPhoneNumber,
            isHistoryOfStayingWithConfirmed = :isHistoryOfStayingWithConfirmed,
            isHistoryofTravelingTogetherConfirmed = :isHistoryofTravelingTogetherConfirmed,
            workerLastName = :workerLastName,
            workerFirstName = :workerFirstName,
            workerAge = :workerAge,
            workerSex = :workerSex,
            workerCity = :workerCity,
            workerCountry = :workerCountry,
            workerContactDetails = :workerContactDetails,
            workerTypeOfPersonnel = : workerTypeOfPersonnel,
            workerFacilityUnitType = :workerFacilityUnitType,
            workerFirstExposureDate = :workerFirstExposureDate,
            healthCareFacility = :healthCareFacility,
            healthCareSetting = :healthCareSetting,
            healthCareCity = :healthCareCity,
            healthCareCountry = :healthCareCountry,
            hasMultipleCovidPatients = :hasMultipleCovidPatients,
            hasProvidedCareToCovidPatients = :hasProvidedCareToCovidPatients,
            hasFaceToFaceContactWithCovidPatients = :hasFaceToFaceContactWithCovidPatients,
            isPresentDuringAGP = :isPresentDuringAGP,
            typeOfAGP = :typeOfAGP,
            hasDirectContactWithCovidEnvironment = :hasDirectContactWithCovidEnvironment,
            typeOfFacilityCareIsAlsoProvided = :typeOfFacilityCareIsAlsoProvided,
            hasWornPPE = :hasWornPPE,
            frequencySingleGloves = :frequencySingleGloves,
            frequencyMedicalMask = :frequencyMedicalMask,
            frequencyFaceShield = :frequencyFaceShield,
            frequencyDisposableGown = :frequencyDisposableGown,
            frequencyRemoveAndReplacePPE = :frequencyRemoveAndReplacePPE,
            frequencyHandHygieneWhenTouchingPatient = :frequencyHandHygieneWhenTouchingPatient,
            frequencyHandHygieneAsepticProcedure = :frequencyHandHygieneAsepticProcedure,
            frequencyHandHygieneBodyFluidExposure = :frequencyHandHygieneBodyFluidExposure,
            frequencyHandHygienePatientEnvironment = :frequencyHandHygienePatientEnvironment,
            frequencyDecontaminationOfHighTouchSurfaces = :frequencyDecontaminationOfHighTouchSurfaces,
            ASP_hasWornPPE = :ASP_hasWornPPE,
            ASP_frequencySingleGloves = :ASP_frequencySingleGloves,
            ASP_frequencyN95Mask = :ASP_frequencyN95Mask,
            ASP_frequencyFaceShield = :ASP_frequencyFaceShield,
            ASP_frequencyDisposableGown = :ASP_frequencyDisposableGown,
            ASP_frequencyWaterproofApron = :ASP_frequencyWaterproofApron,
            ASP_frequencyRemoveAndReplacePPE = :ASP_frequencyRemoveAndReplacePPE,
            ASP_frequencyHHWhenTouchingPatient = :ASP_frequencyHHWhenTouchingPatient,
            ASP_frequencyHHAsepticProcedure = :ASP_frequencyHHAsepticProcedure,
            ASP_frequencyHHPatientEnvironment = :ASP_frequencyHHPatientEnvironment,
            ASP_frequencyDecontaminationOfHighTouchSurfaces = :ASP_frequencyDecontaminationOfHighTouchSurfaces,
            hasAccidentWithBiologicalSecretions = :hasAccidentWithBiologicalSecretions,
            typeOfBiologicalSecretionAccident = :typeOfBiologicalSecretionAccident';

            //PREPARED STATEMENT
            $stmt = $this->conn->prepare($query);  

            //Clean data 
            $this->interviewerName = htmlspecialchars(strip_tags($this->interviewerName));
            $this->interviewerDate = htmlspecialchars(strip_tags($this->interviewerDate));
            $this->interviewerPhoneNumber = htmlspecialchars(strip_tags($this->interviewerPhoneNumber));
            $this->isHistoryOfStayingWithConfirmed = htmlspecialchars(strip_tags($this->isHistoryOfStayingWithConfirmed));
            $this->isHistoryofTravelingTogetherConfirmed = htmlspecialchars(strip_tags($this->isHistoryofTravelingTogetherConfirmed));
            $this->workerLastName = htmlspecialchars(strip_tags($this->workerLastName));
            $this->workerFirstName = htmlspecialchars(strip_tags($this->workerFirstName));
            $this->workerAge = htmlspecialchars(strip_tags($this->workerAge));
            $this->workerSex = htmlspecialchars(strip_tags($this->workerSex));
            $this->workerCity = htmlspecialchars(strip_tags($this->workerCity));
            $this->workerCountry = htmlspecialchars(strip_tags($this->workerCountry));
            $this->workerContactDetails = htmlspecialchars(strip_tags($this->workerContactDetails));
            $this->workerTypeOfPersonnel = htmlspecialchars(strip_tags($this->workerTypeOfPersonnel));
            $this->workerFacilityUnitType = htmlspecialchars(strip_tags($this->workerFacilityUnitType));
            $this->workerFirstExposureDate = htmlspecialchars(strip_tags($this->workerFirstExposureDate));
            $this->healthCareFacility = htmlspecialchars(strip_tags($this->healthCareFacility));
            $this->healthCareSetting = htmlspecialchars(strip_tags($this->healthCareSetting));
            $this->healthCareCity = htmlspecialchars(strip_tags($this->healthCareCity));
            $this->healthCareCountry = htmlspecialchars(strip_tags($this->healthCareCountry));
            $this->hasMultipleCovidPatients = htmlspecialchars(strip_tags($this->hasMultipleCovidPatients));
            $this->hasProvidedCareToCovidPatients = htmlspecialchars(strip_tags($this->hasProvidedCareToCovidPatients));
            $this->hasFaceToFaceContactWithCovidPatients = htmlspecialchars(strip_tags($this->hasFaceToFaceContactWithCovidPatients));
            $this->isPresentDuringAGP = htmlspecialchars(strip_tags($this->isPresentDuringAGP));
            $this->typeOfAGP = htmlspecialchars(strip_tags($this->typeOfAGP));
            $this->hasDirectContactWithCovidEnvironment = htmlspecialchars(strip_tags($this->hasDirectContactWithCovidEnvironment));
            $this->typeOfFacilityCareIsAlsoProvided = htmlspecialchars(strip_tags($this->typeOfFacilityCareIsAlsoProvided));
            $this->hasWornPPE = htmlspecialchars(strip_tags($this->hasWornPPE));
            $this->frequencySingleGloves = htmlspecialchars(strip_tags($this->frequencySingleGloves));
            $this->frequencyMedicalMask = htmlspecialchars(strip_tags($this->frequencyMedicalMask));
            $this->frequencyFaceShield = htmlspecialchars(strip_tags($this->frequencyFaceShield));
            $this->frequencyDisposableGown = htmlspecialchars(strip_tags($this->frequencyDisposableGown));
            $this->frequencyRemoveAndReplacePPE = htmlspecialchars(strip_tags($this->frequencyRemoveAndReplacePPE));
            $this->frequencyHandHygieneWhenTouchingPatient = htmlspecialchars(strip_tags($this->frequencyHandHygieneWhenTouchingPatient));
            $this->frequencyHandHygieneAsepticProcedure = htmlspecialchars(strip_tags($this->frequencyHandHygieneAsepticProcedure));
            $this->frequencyHandHygieneBodyFluidExposure = htmlspecialchars(strip_tags($this->frequencyHandHygieneBodyFluidExposure));
            $this->frequencyHandHygienePatientEnvironment = htmlspecialchars(strip_tags($this->frequencyHandHygienePatientEnvironment));
            $this->frequencyDecontaminationOfHighTouchSurfaces = htmlspecialchars(strip_tags($this->frequencyDecontaminationOfHighTouchSurfaces));
            $this->ASP_hasWornPPE = htmlspecialchars(strip_tags($this->ASP_hasWornPPE));
            $this->ASP_frequencySingleGloves = htmlspecialchars(strip_tags($this->ASP_frequencySingleGloves));
            $this->ASP_frequencyN95Mask = htmlspecialchars(strip_tags($this->ASP_frequencyN95Mask));
            $this->ASP_frequencyFaceShield = htmlspecialchars(strip_tags($this->ASP_frequencyFaceShield));
            $this->ASP_frequencyDisposableGown = htmlspecialchars(strip_tags($this->ASP_frequencyDisposableGown));
            $this->ASP_frequencyWaterproofApron = htmlspecialchars(strip_tags($this->ASP_frequencyWaterproofApron));
            $this->ASP_frequencyRemoveAndReplacePPE = htmlspecialchars(strip_tags($this->ASP_frequencyRemoveAndReplacePPE));
            $this->ASP_frequencyHHWhenTouchingPatient = htmlspecialchars(strip_tags($this->ASP_frequencyHHWhenTouchingPatient));
            $this->ASP_frequencyHHAsepticProcedure = htmlspecialchars(strip_tags($this->ASP_frequencyHHAsepticProcedure));
            $this->ASP_frequencyHHPatientEnvironment = htmlspecialchars(strip_tags($this->ASP_frequencyHHPatientEnvironment));
            $this->ASP_frequencyDecontaminationOfHighTouchSurfaces = htmlspecialchars(strip_tags($this->ASP_frequencyDecontaminationOfHighTouchSurfaces));
            $this->hasAccidentWithBiologicalSecretions = htmlspecialchars(strip_tags($this->hasAccidentWithBiologicalSecretions));
            $this->typeOfBiologicalSecretionAccident = htmlspecialchars(strip_tags($this->typeOfBiologicalSecretionAccident));
            

            //Bind data
            $stmt->bindParam(':interviewerName',$this->interviewerName);
            $stmt->bindParam(':interviewerDate',$this->interviewerDate);
            $stmt->bindParam(':interviewerPhoneNumber',$this->interviewerPhoneNumber);
            $stmt->bindParam(':isHistoryOfStayingWithConfirmed',$this->isHistoryOfStayingWithConfirmed);
            $stmt->bindParam(':isHistoryofTravelingTogetherConfirmed',$this->isHistoryofTravelingTogetherConfirmed);
            $stmt->bindParam(':workerLastName',$this->workerLastName);
            $stmt->bindParam(':workerFirstName',$this->workerFirstName);
            $stmt->bindParam(':workerAge',$this->workerAge);
            $stmt->bindParam(':workerSex',$this->workerSex);
            $stmt->bindParam(':workerCity',$this->workerCity);
            $stmt->bindParam(':workerCountry',$this->workerCountry);
            $stmt->bindParam(':workerContactDetails',$this->workerContactDetails);
            $stmt->bindParam(':workerTypeOfPersonnel',$this->workerTypeOfPersonnel);
            $stmt->bindParam(':workerFacilityUnitType',$this->workerFacilityUnitType);
            $stmt->bindParam(':workerFirstExposureDate',$this->workerFirstExposureDate);
            $stmt->bindParam(':healthCareFacility',$this->healthCareFacility);
            $stmt->bindParam(':healthCareSetting',$this->healthCareSetting);
            $stmt->bindParam(':healthCareCity',$this->healthCareCity);
            $stmt->bindParam(':healthCareCountry',$this->healthCareCountry);
            $stmt->bindParam(':hasMultipleCovidPatients',$this->hasMultipleCovidPatients);
            $stmt->bindParam(':hasProvidedCareToCovidPatients',$this->hasProvidedCareToCovidPatients);
            $stmt->bindParam(':hasFaceToFaceContactWithCovidPatients',$this->hasFaceToFaceContactWithCovidPatients);
            $stmt->bindParam(':isPresentDuringAGP',$this->isPresentDuringAGP);
            $stmt->bindParam(':typeOfAGP',$this->typeOfAGP);
            $stmt->bindParam(':hasDirectContactWithCovidEnvironment',$this->hasDirectContactWithCovidEnvironment);
            $stmt->bindParam(':typeOfFacilityCareIsAlsoProvided',$this->typeOfFacilityCareIsAlsoProvided);
            $stmt->bindParam(':hasWornPPE',$this->hasWornPPE);
            $stmt->bindParam(':frequencySingleGloves',$this->frequencySingleGloves);
            $stmt->bindParam(':frequencyMedicalMask',$this->frequencyMedicalMask);
            $stmt->bindParam(':frequencyFaceShield',$this->frequencyFaceShield);
            $stmt->bindParam(':frequencyDisposableGown',$this->frequencyDisposableGown);
            $stmt->bindParam(':frequencyRemoveAndReplacePPE',$this->frequencyRemoveAndReplacePPE);
            $stmt->bindParam(':frequencyHandHygieneWhenTouchingPatient',$this->frequencyHandHygieneWhenTouchingPatient);
            $stmt->bindParam(':frequencyHandHygieneAsepticProcedure',$this->frequencyHandHygieneAsepticProcedure);
            $stmt->bindParam(':frequencyHandHygieneBodyFluidExposure',$this->frequencyHandHygieneBodyFluidExposure);
            $stmt->bindParam(':frequencyHandHygienePatientEnvironment',$this->frequencyHandHygienePatientEnvironment);
            $stmt->bindParam(':frequencyDecontaminationOfHighTouchSurfaces',$this->frequencyDecontaminationOfHighTouchSurfaces);
            $stmt->bindParam(':ASP_hasWornPPE',$this->ASP_hasWornPPE);
            $stmt->bindParam(':ASP_frequencySingleGloves',$this->ASP_frequencySingleGloves);
            $stmt->bindParam(':ASP_frequencyN95Mask',$this->ASP_frequencyN95Mask);
            $stmt->bindParam(':ASP_frequencyFaceShield',$this->ASP_frequencyFaceShield);
            $stmt->bindParam(':ASP_frequencyDisposableGown',$this->ASP_frequencyDisposableGown);
            $stmt->bindParam(':ASP_frequencyWaterproofApron',$this->ASP_frequencyWaterproofApron);
            $stmt->bindParam(':ASP_frequencyRemoveAndReplacePPE',$this->ASP_frequencyRemoveAndReplacePPE);
            $stmt->bindParam(':ASP_frequencyHHWhenTouchingPatient',$this->ASP_frequencyHHWhenTouchingPatient);
            $stmt->bindParam(':ASP_frequencyHHAsepticProcedure',$this->ASP_frequencyHHAsepticProcedure);
            $stmt->bindParam(':ASP_frequencyHHPatientEnvironment',$this->ASP_frequencyHHPatientEnvironment);
            $stmt->bindParam(':ASP_frequencyDecontaminationOfHighTouchSurfaces',$this->ASP_frequencyDecontaminationOfHighTouchSurfaces);
            $stmt->bindParam(':hasAccidentWithBiologicalSecretions',$this->hasAccidentWithBiologicalSecretions);
            $stmt->bindParam(':typeOfBiologicalSecretionAccident',$this->typeOfBiologicalSecretionAccident);

            //execute query
            if($stmt->execute()) {
                return true;
            }
            
            //print error if something goes wrong
            prinf("Error: %s.\n", $stmt->error);

            return false;
        }

    }
?>