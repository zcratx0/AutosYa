<?php
    class generic {
        public $connection;
        private $user = 'root';
        private $pass = '';

        private function constructor() {
            $this->connection = new PDO("mysql:host=localhost;dbname=alquileres_vehiculos",$this->user,$this->pass);
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