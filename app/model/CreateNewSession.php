<?php
    class CreateNewSession {

        //Connecting to a database
        public function __construct() {
            $this->db = Database::instance();
        }

        //adding new session to the databse
        public function addNewSession() {
            
            //getting all the data from global $_POST variable
            $name = $_POST['eventName'];
            $numberAllowed = $_POST['numberAllowed'];
            $dateStart = $_POST['dateStart'];
            $dateEnd = $_POST['dateEnd'];


            //sanitizing string user data
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            $dateStart = filter_var($dateStart, FILTER_SANITIZE_STRING);
            $dateEnd = filter_var($dateEnd, FILTER_SANITIZE_STRING);

            //sanitizing strings for special characters
            $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
            $dateStart = filter_var($dateStart, FILTER_SANITIZE_SPECIAL_CHARS);
            $dateEnd = filter_var($dateEnd, FILTER_SANITIZE_SPECIAL_CHARS);
            

            if ($_POST['event'] == "Career Education Day") {
                $event = 1;
            } else if ($_POST['event'] == "Evelina Class") {
                $event = 2;
            }

            //sanitizing number user data
            $numberAllowed = filter_var($numberAllowed, FILTER_SANITIZE_NUMBER_INT);
            $event = filter_var($event, FILTER_SANITIZE_NUMBER_INT);
            

            //Startin a session to be able get "role" data about current user
            session_start();
            $role = $_SESSION["role"];

            
            $stmt = $this->db->prepare(
                "INSERT INTO `session`( `name`, `numberallowed`, `event`, `startdate`, `enddate`) 
                 VALUES ('$name',$numberAllowed,$event,'$dateStart','$dateEnd')");
                 
            $stmt->execute();

            if ($role == 1) {
                header("Location: index.php?page=admin&method=getAllData");
            } 
            else if ($role == 2) {
                header("Location: index.php?page=eventmanager&method=getAllData");
            }

        }

    }

?>