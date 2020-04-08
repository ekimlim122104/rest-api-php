<?php
    class Database {
        //DB Params
        private $host = 'localhost';
        private $db_name = 'contact_tracing';
        private $username = 'root';
        private $password = '';
        private $conn;

        //DB Conect
        public function connect() {
            $this->conn = null;
            
            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname='.$this->db_name,
                $this->username,$this->password);
                
                //error handler when query goes wrong
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error: ' .$e.getMessage();
            }
            return $this->conn;
        }
    }
?>