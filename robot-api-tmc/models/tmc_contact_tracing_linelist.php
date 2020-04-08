<?php
    class tmc_contact_tracing_linelist {
        //DF STUFF
        private $conn;
        private $table = "`tmc contact tracing linelist`";

        //tmc_contact_tracing_linelist properties
        public $id;
        public $timestamp;
        public $firstName;
        public $lastName;
        public $gender;
        public $homeDepartment;
        public $contactNumber;
        public $completeAddress;
        public $dateOfExposure;
        public $ppeUsed;
        public $locationOfExposure;
        public $describeExposure;
        public $isWearingFaceMask;
        public $profession;
        public $lengthOfExposure;
        
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
        //             timestamp = :timestamp,
        public function create(){
            //Create query
            $query = 'INSERT INTO '.
            $this->table.' 
            SET 
            firstName = :firstName,
            lastName = :lastName,
            gender = :gender,
            homeDepartment = :homeDepartment,
            contactNumber = :contactNumber,
            completeAddress = :completeAddress,
            dateOfExposure = :dateOfExposure,
            ppeUsed = :ppeUsed,
            locationOfExposure = :locationOfExposure,
            describeExposure = :describeExposure,
            isWearingFaceMask = :isWearingFaceMask,
            profession = :profession,
            lengthOfExposure = :lengthOfExposure';

            //PREPARED STATEMENT
            $stmt = $this->conn->prepare($query);   
            //Clean data 
            // $this->timestamp = htmlspecialchars(strip_tags($this->timestamp));
            $this->firstName = htmlspecialchars(strip_tags($this->firstName));
            $this->lastName = htmlspecialchars(strip_tags($this->lastName));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->homeDepartment = htmlspecialchars(strip_tags($this->homeDepartment));
            $this->contactNumber = htmlspecialchars(strip_tags($this->contactNumber));
            $this->completeAddress = htmlspecialchars(strip_tags($this->completeAddress));
            $this->dateOfExposure = htmlspecialchars(strip_tags($this->dateOfExposure));
            $this->ppeUsed = htmlspecialchars(strip_tags($this->ppeUsed));
            $this->locationOfExposure = htmlspecialchars(strip_tags($this->locationOfExposure));
            $this->describeExposure = htmlspecialchars(strip_tags($this->describeExposure));
            $this->isWearingFaceMask = htmlspecialchars(strip_tags($this->isWearingFaceMask));
            $this->profession = htmlspecialchars(strip_tags($this->profession));
            $this->lengthOfExposure = htmlspecialchars(strip_tags($this->lengthOfExposure));
            

            //Bind data
            $stmt->bindParam(':firstName',$this->firstName);
            $stmt->bindParam(':lastName',$this->lastName);
            $stmt->bindParam(':gender',$this->gender);
            $stmt->bindParam(':homeDepartment',$this->homeDepartment);
            $stmt->bindParam(':contactNumber',$this->contactNumber);
            $stmt->bindParam(':completeAddress',$this->completeAddress);
            $stmt->bindParam(':dateOfExposure',$this->dateOfExposure);
            $stmt->bindParam(':ppeUsed',$this->ppeUsed);
            $stmt->bindParam(':locationOfExposure',$this->locationOfExposure);
            $stmt->bindParam(':describeExposure',$this->describeExposure);
            $stmt->bindParam(':isWearingFaceMask',$this->isWearingFaceMask);
            $stmt->bindParam(':profession',$this->profession);
            $stmt->bindParam(':lengthOfExposure',$this->lengthOfExposure);

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