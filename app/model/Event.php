<?php
class Event
{
    
    public $id;
    
    //Connecting to a database
    public function __construct()
    {
        $this->db = Database::instance();
    }
    
    //editing the event
    public function editEvent()
    { 
        $stmt = $this->db->prepare("
        Select event.idevent, event.name, event.datestart, event.dateend, event.numberallowed, event.venue, attendee.name as 'attendeeName' 
        from event, attendee, manager_event 
        where attendee.idattendee = manager_event.manager 
        and manager_event.event = event.idevent");

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Admin");
        return $stmt->fetchAll();  
    }
    
    //deleting the event based on the ID and than redirecting the user based on its role
    public function deleteEvent($id)
    {
        
        session_start();
        $role = $_SESSION["role"];
        
        $stmt = $this->db->prepare("DELETE FROM `event` WHERE idevent = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //redirecting the user based on the role it has
        if ($role == 1) {
            header("Location: index.php?page=admin&method=getAllData");
        } else if ($role == 2) {
            header("Location: index.php?page=eventmanager&method=getAllData");
        }
        
    }
    
    
}

?>