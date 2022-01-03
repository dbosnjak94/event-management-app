<?php
class CreateNewEvent
{
    
    //Connecting to a database
    public function __construct()
    {
        $this->db = Database::instance();
    }
    
    //adding new event to the database
    public function addNewEvent()
    {
        
        //getting all the data from global $_POST variable
        $name          = $_POST['eventName'];
        $dateStart     = $_POST['dateStart'];
        $dateEnd       = $_POST['dateEnd'];
        $numberAllowed = $_POST['numberAllowed'];


        //sanitizing string user data
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $dateStart = filter_var($dateStart, FILTER_SANITIZE_STRING);
        $dateEnd = filter_var($dateEnd, FILTER_SANITIZE_STRING);

        //sanitizing strings for special characters
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);
        $dateStart = filter_var($dateStart, FILTER_SANITIZE_SPECIAL_CHARS);
        $dateEnd = filter_var($dateEnd, FILTER_SANITIZE_SPECIAL_CHARS);
        
        //checking the id of the event
        if ($_POST['venue'] == "Westin") {
            $venue = 1;
        } else if ($_POST['venue'] == "HNK") {
            $venue = 2;
        }
        //sanitizing number user data
        $numberAllowed = filter_var($numberAllowed, FILTER_SANITIZE_NUMBER_INT);
        $venue = filter_var($venue, FILTER_SANITIZE_NUMBER_INT);
        
        //Starting a session to be able get "role" data about current user
        session_start();
        $role = $_SESSION["role"];
        
        
        $stmt = $this->db->prepare("INSERT INTO `event`(`name`, `datestart`, `dateend`, `numberallowed`, `venue`) 
                 VALUES ('$name','$dateStart','$dateEnd',$numberAllowed,$venue)");
        
        $stmt->execute();
        
        //checking the role of the user so that it can be redirected to a right page 
        if ($role == 1) {
            header("Location: index.php?page=admin&method=getAllData");
        } else if ($role == 2) {
            header("Location: index.php?page=eventmanager&method=getAllData");
        }

   
    }
    
}

?>
