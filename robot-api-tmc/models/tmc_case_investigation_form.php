<?php
    class tmc_case_investigation_form {
        //DF STUFF
        private $conn;
        private $table = "`tmc case investigation form`";

        //tmc case investigation form properties
        public $id;
        public $diseaseReportUnit;
        public $nameOfInvestigator;
        public $dateOfInterview;
        public $lastName;
        public $firstName;
        public $middleName;
        public $birthday;
        public $age;
        public $Gender;
        public $occupation;
        public $civilStatus;
        public $nationality;
        public $passportNumber;
        public $houseNumber;
        public $street;
        public $municipality;
        public $province;
        public $region;
        public $homePhoneNumber;
        public $cellphoneNumber;
        public $emailAddress;
        public $ofw_employersName;
        public $ofw_occupation;
        public $ofw_placeOfWork;
        public $ofw_HouseNumber;
        public $ofw_Street;
        public $ofw_municipality;
        public $ofw_province;
        public $ofw_country;
        public $ofw_officePhoneNumber;
        public $ofw_cellphoneNumber;
        public $hasHistoryOfTravel;
        public $portOfExit;
        public $airline;
        public $flightNumber;
        public $dateOfDeparture;
        public $dateOfArrival;
        public $hasHistoryOfExposure;
        public $dateOfContactWithCovid19;
        public $clinicalStatusAtTimeOfReport;
        public $dateOfOnsetOfIllness;
        public $dateOfAdmission;
        public $fever;
        public $hasCough;
        public $hasSoreThroat;
        public $hasColds;
        public $hasShortnesOfBreathing;
        public $otherSymptoms;
        public $hasHistoryOfOtherIllness;
        public $otherIllnessSpecify;
        public $ischestXrayDone;
        public $chestXrayDate;
        public $isPregnant;
        public $pregnantLMP;
        public $cxrResultsPneumonia;
        public $otherRadiologicFindings;
        public $isSerum;
        public $serumDateCollected;
        public $serumDateSentToRITM;
        public $serumDateReceivedInRITM;
        public $serumVirusIsolationResult;
        public $serumPCRResult;
        public $isOropharyngeal;
        public $oropharyngealDateCollected;
        public $oropharyngealDateSentToRITM;
        public $oropharyngealDateReceivedInRITM;
        public $oropharyngealVirusIsolationResult;
        public $oropharyngealPCRResult;
        public $isOthers;
        public $othersDateCollected;
        public $othersDateSentToRITM;
        public $othersDateReceivedInRITM;
        public $othersVirusIsolationResult;
        public $othersPCRResult;
        public $finalClassification;
        public $dateOfDischarge;
        public $conditionOfDischarge;
        public $nameOfInformant;
        public $informantRelationship;
        public $informantPhoneNumber;

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

        //get single user
        // public function read_single(){
        //     //CREATE QUERY
        //     $query = 'SELECT * FROM '. $this->table .' WHERE id = ? LIMIT 0,1';
        //     //PREPARED STATEMENT
        //     $stmt = $this->conn->prepare($query);
        //     //BIND ID
        //     $stmt->bindParam(1,$this->id);
        //     //EXECUTE QUERY
        //     $stmt->execute();
        //     //fetch
        //     $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //     //SET PROPERTIES
        //     $this->id = $row['id'];
        //     $this->fname = $row['fname'];
        //     $this->mname = $row['mname'];
        //     $this->lname = $row['lname'];
        // }

        //Create User
        public function create(){
            //Create query
            $query = 'INSERT INTO '.
            $this->table.' 
            SET 
            diseaseReportUnit = :diseaseReportUnit,
            nameOfInvestigator = :nameOfInvestigator,
            dateOfInterview = :dateOfInterview,
            lastName = :lastName,
            firstName = :firstName,
            middleName = :middleName,
            birthday = :birthday,
            age = :age,
            Gender = :Gender,
            occupation = :occupation,
            civilStatus = :civilStatus,
            nationality = :nationality,
            passportNumber = :passportNumber,
            houseNumber = :houseNumber,
            street = :street,
            municipality = :municipality,
            province = :province,
            region = :region,
            homePhoneNumber = :homePhoneNumber,
            cellphoneNumber = :cellphoneNumber,
            emailAddress = :emailAddress,
            ofw_employersName = :ofw_employersName,
            ofw_occupation = :ofw_occupation,
            ofw_placeOfWork = :ofw_placeOfWork,
            ofw_HouseNumber = :ofw_HouseNumber,
            ofw_Street = :ofw_Street,
            ofw_municipality = :ofw_municipality,
            ofw_province = :ofw_province,
            ofw_country = :ofw_country,
            ofw_officePhoneNumber = :ofw_officePhoneNumber,
            ofw_cellphoneNumber = :ofw_cellphoneNumber,
            hasHistoryOfTravel = :hasHistoryOfTravel,
            portOfExit = :portOfExit,
            airline = :airline,
            flightNumber = :flightNumber,
            dateOfDeparture = :dateOfDeparture,
            dateOfArrival = :dateOfArrival,
            hasHistoryOfExposure = :hasHistoryOfExposure,
            dateOfContactWithCovid19 = :dateOfContactWithCovid19,
            clinicalStatusAtTimeOfReport = :clinicalStatusAtTimeOfReport,
            dateOfOnsetOfIllness = :dateOfOnsetOfIllness,
            dateOfAdmission = :dateOfAdmission,
            fever = :fever,
            hasCough = :hasCough,
            hasSoreThroat = :hasSoreThroat,
            hasColds = :hasColds,
            hasShortnesOfBreathing = :hasShortnesOfBreathing,
            otherSymptoms = :otherSymptoms,
            hasHistoryOfOtherIllness = :hasHistoryOfOtherIllness,
            otherIllnessSpecify = :otherIllnessSpecify,
            ischestXrayDone = :ischestXrayDone,
            chestXrayDate = :chestXrayDate,
            isPregnant = :isPregnant,
            pregnantLMP = :pregnantLMP,
            cxrResultsPneumonia = :cxrResultsPneumonia,
            otherRadiologicFindings = :otherRadiologicFindings,
            isSerum = :isSerum,
            serumDateCollected = :serumDateCollected,
            serumDateSentToRITM = :serumDateSentToRITM,
            serumDateReceivedInRITM = :serumDateReceivedInRITM,
            serumVirusIsolationResult = :serumVirusIsolationResult,
            serumPCRResult = :serumPCRResult,
            isOropharyngeal = :isOropharyngeal,
            oropharyngealDateCollected = :oropharyngealDateCollected,
            oropharyngealDateSentToRITM = :oropharyngealDateSentToRITM,
            oropharyngealDateReceivedInRITM = :oropharyngealDateReceivedInRITM,
            oropharyngealVirusIsolationResult = :oropharyngealVirusIsolationResult,
            oropharyngealPCRResult = :oropharyngealPCRResult,
            isOthers = :isOthers,
            othersDateCollected = :othersDateCollected,
            othersDateSentToRITM = :othersDateSentToRITM,
            othersDateReceivedInRITM = :othersDateReceivedInRITM,
            othersVirusIsolationResult = :othersVirusIsolationResult,
            othersPCRResult = :othersPCRResult,
            finalClassification = :finalClassification,
            dateOfDischarge = :dateOfDischarge,
            conditionOfDischarge = :conditionOfDischarge,
            nameOfInformant = :nameOfInformant,
            informantRelationship = :informantRelationship,
            informantPhoneNumber = :informantPhoneNumber';

            //PREPARED STATEMENT
            $stmt = $this->conn->prepare($query);   
            //Clean data 
            $this->diseaseReportUnit = htmlspecialchars(strip_tags($this->diseaseReportUnit));
            $this->nameOfInvestigator = htmlspecialchars(strip_tags($this->nameOfInvestigator));
            $this->dateOfInterview = htmlspecialchars(strip_tags($this->dateOfInterview));
            $this->lastName = htmlspecialchars(strip_tags($this->lastName));
            $this->middleName = htmlspecialchars(strip_tags($this->middleName));
            $this->birthday = htmlspecialchars(strip_tags($this->birthday));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->Gender = htmlspecialchars(strip_tags($this->Gender));
            $this->occupation = htmlspecialchars(strip_tags($this->occupation));
            $this->civilStatus = htmlspecialchars(strip_tags($this->civilStatus));
            $this->nationality = htmlspecialchars(strip_tags($this->nationality));
            $this->passportNumber = htmlspecialchars(strip_tags($this->passportNumber));
            $this->houseNumber = htmlspecialchars(strip_tags($this->houseNumber));
            $this->street = htmlspecialchars(strip_tags($this->street));
            $this->province = htmlspecialchars(strip_tags($this->municipality));
            $this->region = htmlspecialchars(strip_tags($this->region));
            $this->homePhoneNumber = htmlspecialchars(strip_tags($this->homePhoneNumber));
            $this->cellphoneNumber = htmlspecialchars(strip_tags($this->cellphoneNumber));
            $this->emailAddress = htmlspecialchars(strip_tags($this->emailAddress));
            $this->ofw_employersName = htmlspecialchars(strip_tags($this->ofw_employersName));
            $this->ofw_occupation = htmlspecialchars(strip_tags($this->ofw_occupation));
            $this->ofw_placeOfWork = htmlspecialchars(strip_tags($this->ofw_placeOfWork));
            $this->ofw_HouseNumber = htmlspecialchars(strip_tags($this->ofw_HouseNumber));
            $this->ofw_Street = htmlspecialchars(strip_tags($this->ofw_Street));
            $this->ofw_municipality = htmlspecialchars(strip_tags($this->ofw_municipality));
            $this->ofw_province = htmlspecialchars(strip_tags($this->ofw_province));
            $this->ofw_country = htmlspecialchars(strip_tags($this->ofw_country));
            $this->ofw_officePhoneNumber = htmlspecialchars(strip_tags($this->ofw_officePhoneNumber));
            $this->ofw_cellphoneNumber = htmlspecialchars(strip_tags($this->ofw_cellphoneNumber));
            $this->hasHistoryOfTravel = htmlspecialchars(strip_tags($this->hasHistoryOfTravel));
            $this->portOfExit = htmlspecialchars(strip_tags($this->portOfExit));
            $this->airline = htmlspecialchars(strip_tags($this->airline));
            $this->flightNumber = htmlspecialchars(strip_tags($this->flightNumber));
            $this->dateOfDeparture = htmlspecialchars(strip_tags($this->dateOfDeparture));
            $this->dateOfArrival = htmlspecialchars(strip_tags($this->dateOfArrival));
            $this->hasHistoryOfExposure = htmlspecialchars(strip_tags($this->hasHistoryOfExposure));
            $this->dateOfContactWithCovid19 = htmlspecialchars(strip_tags($this->dateOfContactWithCovid19));
            $this->clinicalStatusAtTimeOfReport = htmlspecialchars(strip_tags($this->clinicalStatusAtTimeOfReport));
            $this->dateOfOnsetOfIllness = htmlspecialchars(strip_tags($this->dateOfOnsetOfIllness));
            $this->dateOfAdmission = htmlspecialchars(strip_tags($this->dateOfAdmission));
            $this->fever = htmlspecialchars(strip_tags($this->fever));
            $this->hasCough = htmlspecialchars(strip_tags($this->hasCough));
            $this->hasSoreThroat = htmlspecialchars(strip_tags($this->hasSoreThroat));
            $this->hasColds = htmlspecialchars(strip_tags($this->hasColds));
            $this->hasShortnesOfBreathing = htmlspecialchars(strip_tags($this->hasShortnesOfBreathing));
            $this->otherSymptoms = htmlspecialchars(strip_tags($this->otherSymptoms));
            $this->hasHistoryOfOtherIllness = htmlspecialchars(strip_tags($this->hasHistoryOfOtherIllness));
            $this->otherIllnessSpecify = htmlspecialchars(strip_tags($this->otherIllnessSpecify));
            $this->ischestXrayDone = htmlspecialchars(strip_tags($this->ischestXrayDone));
            $this->chestXrayDate = htmlspecialchars(strip_tags($this->chestXrayDate));
            $this->isPregnant = htmlspecialchars(strip_tags($this->isPregnant));
            $this->pregnantLMP = htmlspecialchars(strip_tags($this->pregnantLMP));
            $this->cxrResultsPneumonia = htmlspecialchars(strip_tags($this->cxrResultsPneumonia));
            $this->otherRadiologicFindings = htmlspecialchars(strip_tags($this->otherRadiologicFindings));
            $this->isSerum = htmlspecialchars(strip_tags($this->isSerum));
            $this->serumDateCollected = htmlspecialchars(strip_tags($this->serumDateCollected));
            $this->serumDateSentToRITM = htmlspecialchars(strip_tags($this->serumDateSentToRITM));
            $this->serumDateReceivedInRITM = htmlspecialchars(strip_tags($this->serumDateReceivedInRITM));
            $this->serumVirusIsolationResult = htmlspecialchars(strip_tags($this->serumVirusIsolationResult));
            $this->serumPCRResult = htmlspecialchars(strip_tags($this->serumPCRResult));
            $this->isOropharyngeal = htmlspecialchars(strip_tags($this->isOropharyngeal));
            $this->oropharyngealDateCollected = htmlspecialchars(strip_tags($this->oropharyngealDateCollected));
            $this->oropharyngealDateSentToRITM = htmlspecialchars(strip_tags($this->oropharyngealDateSentToRITM));
            $this->oropharyngealDateReceivedInRITM = htmlspecialchars(strip_tags($this->oropharyngealDateReceivedInRITM));
            $this->oropharyngealVirusIsolationResult = htmlspecialchars(strip_tags($this->oropharyngealVirusIsolationResult));
            $this->oropharyngealPCRResult = htmlspecialchars(strip_tags($this->oropharyngealPCRResult));
            $this->isOthers = htmlspecialchars(strip_tags($this->isOthers));
            $this->othersDateCollected = htmlspecialchars(strip_tags($this->othersDateCollected));
            $this->othersDateSentToRITM = htmlspecialchars(strip_tags($this->othersDateSentToRITM));
            $this->othersDateReceivedInRITM = htmlspecialchars(strip_tags($this->othersDateReceivedInRITM));
            $this->othersVirusIsolationResult = htmlspecialchars(strip_tags($this->othersVirusIsolationResult));
            $this->othersPCRResult = htmlspecialchars(strip_tags($this->othersPCRResult));
            $this->finalClassification = htmlspecialchars(strip_tags($this->finalClassification));
            $this->dateOfDischarge = htmlspecialchars(strip_tags($this->dateOfDischarge));
            $this->conditionOfDischarge = htmlspecialchars(strip_tags($this->conditionOfDischarge));
            $this->nameOfInformant = htmlspecialchars(strip_tags($this->nameOfInformant));
            $this->informantRelationship = htmlspecialchars(strip_tags($this->informantRelationship));
            $this->informantPhoneNumber = htmlspecialchars(strip_tags($this->informantPhoneNumber));
            

            //Bind data
            $stmt->bindParam(':diseaseReportUnit',$this->diseaseReportUnit);
            $stmt->bindParam(':nameOfInvestigator',$this->nameOfInvestigator);
            $stmt->bindParam(':dateOfInterview',$this->dateOfInterview);
            $stmt->bindParam(':lastName',$this->lastName);
            $stmt->bindParam(':firstName',$this->firstName);
            $stmt->bindParam(':middleName',$this->middleName);
            $stmt->bindParam(':birthday',$this->birthday);
            $stmt->bindParam(':age',$this->age);
            $stmt->bindParam(':Gender',$this->Gender);
            $stmt->bindParam(':occupation',$this->occupation);
            $stmt->bindParam(':civilStatus',$this->civilStatus);
            $stmt->bindParam(':nationality',$this->nationality);
            $stmt->bindParam(':passportNumber',$this->passportNumber);
            $stmt->bindParam(':houseNumber',$this->houseNumber);
            $stmt->bindParam(':street',$this->street);
            $stmt->bindParam(':municipality',$this->municipality);
            $stmt->bindParam(':province',$this->province);
            $stmt->bindParam(':region',$this->region);
            $stmt->bindParam(':homePhoneNumber',$this->homePhoneNumber);
            $stmt->bindParam(':cellphoneNumber',$this->cellphoneNumber);
            $stmt->bindParam(':emailAddress',$this->emailAddress);
            $stmt->bindParam(':ofw_employersName',$this->ofw_employersName);
            $stmt->bindParam(':ofw_occupation',$this->ofw_occupation);
            $stmt->bindParam(':ofw_placeOfWork',$this->ofw_placeOfWork);
            $stmt->bindParam(':ofw_HouseNumber',$this->ofw_HouseNumber);
            $stmt->bindParam(':ofw_Street',$this->ofw_Street);
            $stmt->bindParam(':ofw_municipality',$this->ofw_municipality);
            $stmt->bindParam(':ofw_province',$this->ofw_province);
            $stmt->bindParam(':ofw_country',$this->ofw_country);
            $stmt->bindParam(':ofw_officePhoneNumber',$this->ofw_officePhoneNumber);
            $stmt->bindParam(':ofw_cellphoneNumber',$this->ofw_cellphoneNumber);
            $stmt->bindParam(':hasHistoryOfTravel',$this->hasHistoryOfTravel);
            $stmt->bindParam(':portOfExit',$this->portOfExit);
            $stmt->bindParam(':airline',$this->airline);
            $stmt->bindParam(':flightNumber',$this->flightNumber);
            $stmt->bindParam(':dateOfDeparture',$this->dateOfDeparture);
            $stmt->bindParam(':dateOfArrival',$this->dateOfArrival);
            $stmt->bindParam(':hasHistoryOfExposure',$this->hasHistoryOfExposure);
            $stmt->bindParam(':dateOfContactWithCovid19',$this->dateOfContactWithCovid19);
            $stmt->bindParam(':clinicalStatusAtTimeOfReport',$this->clinicalStatusAtTimeOfReport);
            $stmt->bindParam(':dateOfOnsetOfIllness',$this->dateOfOnsetOfIllness);
            $stmt->bindParam(':dateOfAdmission',$this->dateOfAdmission);
            $stmt->bindParam(':fever',$this->fever);
            $stmt->bindParam(':hasCough',$this->hasCough);
            $stmt->bindParam(':hasSoreThroat',$this->hasSoreThroat);
            $stmt->bindParam(':hasColds',$this->hasColds);
            $stmt->bindParam(':hasShortnesOfBreathing',$this->hasShortnesOfBreathing);
            $stmt->bindParam(':otherSymptoms',$this->otherSymptoms);
            $stmt->bindParam(':hasHistoryOfOtherIllness',$this->hasHistoryOfOtherIllness);
            $stmt->bindParam(':otherIllnessSpecify',$this->otherIllnessSpecify);
            $stmt->bindParam(':ischestXrayDone',$this->ischestXrayDone);
            $stmt->bindParam(':chestXrayDate',$this->chestXrayDate);
            $stmt->bindParam(':isPregnant',$this->isPregnant);
            $stmt->bindParam(':pregnantLMP',$this->pregnantLMP);
            $stmt->bindParam(':cxrResultsPneumonia',$this->cxrResultsPneumonia);
            $stmt->bindParam(':otherRadiologicFindings',$this->otherRadiologicFindings);
            $stmt->bindParam(':isSerum',$this->isSerum);
            $stmt->bindParam(':serumDateCollected',$this->serumDateCollected);
            $stmt->bindParam(':serumDateSentToRITM',$this->serumDateSentToRITM);
            $stmt->bindParam(':serumDateReceivedInRITM',$this->serumDateReceivedInRITM);
            $stmt->bindParam(':serumVirusIsolationResult',$this->serumVirusIsolationResult);
            $stmt->bindParam(':serumPCRResult',$this->serumPCRResult);
            $stmt->bindParam(':isOropharyngeal',$this->isOropharyngeal);
            $stmt->bindParam(':oropharyngealDateCollected',$this->oropharyngealDateCollected);
            $stmt->bindParam(':oropharyngealDateSentToRITM',$this->oropharyngealDateSentToRITM);
            $stmt->bindParam(':oropharyngealDateReceivedInRITM',$this->oropharyngealDateReceivedInRITM);
            $stmt->bindParam(':oropharyngealVirusIsolationResult',$this->oropharyngealVirusIsolationResult);
            $stmt->bindParam(':oropharyngealPCRResult',$this->oropharyngealPCRResult);
            $stmt->bindParam(':isOthers',$this->isOthers);
            $stmt->bindParam(':othersDateCollected',$this->othersDateCollected);
            $stmt->bindParam(':othersDateSentToRITM',$this->othersDateSentToRITM);
            $stmt->bindParam(':othersDateReceivedInRITM',$this->othersDateReceivedInRITM);
            $stmt->bindParam(':othersVirusIsolationResult',$this->othersVirusIsolationResult);
            $stmt->bindParam(':othersPCRResult',$this->othersPCRResult);
            $stmt->bindParam(':finalClassification',$this->finalClassification);
            $stmt->bindParam(':dateOfDischarge',$this->dateOfDischarge);
            $stmt->bindParam(':conditionOfDischarge',$this->conditionOfDischarge);
            $stmt->bindParam(':nameOfInformant',$this->nameOfInformant);
            $stmt->bindParam(':informantRelationship',$this->informantRelationship);
            $stmt->bindParam(':informantPhoneNumber',$this->informantPhoneNumber);

            //execute query
            if($stmt->execute()) {
                return true;
            }
            
            //print error if something goes wrong
            prinf("Error: %s.\n", $stmt->error);

            return false;
        }



        //Update user
        public function update(){
            //Create query
            $query = 'UPDATE '.
            $this->table.' 
            SET 
            fname = :fname, 
            mname = :mname, 
            lname = :lname
            WHERE 
            id = :id';

            //PREPARED STATEMENT
            $stmt = $this->conn->prepare($query);

            //Clean data
            $this->id = htmlspecialchars(strip_tags($this->id)); 
            $this->fname = htmlspecialchars(strip_tags($this->fname));
            $this->mname = htmlspecialchars(strip_tags($this->mname));
            $this->lname = htmlspecialchars(strip_tags($this->lname));

            //Bind data
            $stmt->bindParam(':id',$this->id);
            $stmt->bindParam(':fname',$this->fname);
            $stmt->bindParam(':mname',$this->mname);
            $stmt->bindParam(':lname',$this->lname);

            //execute query
            if($stmt->execute()) {
                return true;
            }
            
            //print error if something goes wrong
            prinf("Error: %s.\n", $stmt->error);

            return false;
        }

        //Delete post

        public function delete(){
            //Create query
            $query = 'DELETE FROM ' . $this->table .' WHERE id = :id';
            //PREPARED STATEMENT
            $stmt = $this->conn->prepare($query);
            //Clean data
            $this->id = htmlspecialchars(strip_tags($this->id));
            //Bind data
            $stmt->bindParam(':id',$this->id);
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