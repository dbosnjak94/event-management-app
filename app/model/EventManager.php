<?php
    class EventManager {

        //Connecting to a database
        public function __construct() {
            $this->db = Database::instance();
        }


         //geting all data about all events
         public function getAllData() {
            $stmt = $this->db->prepare("SELECT * FROM `event`");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, "Admin");
            return $stmt->fetchAll();
        }
    
    }

?>