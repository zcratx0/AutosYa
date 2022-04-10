<?php
    
    class generic {
        public $connection;
        public $user = DBUSER;
        public $pass = DBPASS;
        public $host = DBHOST;
        public $dbname = DBNAME;

        private function constructor() {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function execute($sqlSentence, $sqlArray = array()) {
            $this->connection = new PDO("mysql:host=localhost;dbname=alquileres_vehiculos",$this->user,$this->pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo = $this->connection->prepare($sqlSentence);
            $result = $pdo->execute($sqlArray);
            return $pdo->fetchAll();
        }
        
    }


?>