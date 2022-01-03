<?php
class AttendeeList
{
    
    //Connecting to a database
    public function __construct()
    {
        $this->db = Database::instance();
    }
    
    
    //getting a data about all attendees
    public function getAllAttendees()
    {
        $stmt = $this->db->prepare("SELECT * FROM `attendee`");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "AttendeeList");
        return $stmt->fetchAll();
    }
    
    //deleting attendee from database based on attendee ID
    public function deleteAttendee($id)
    {
        
        session_start();
        $role = $_SESSION["role"];
        
        $stmt = $this->db->prepare("DELETE FROM `attendee` WHERE idattendee = :id ");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        header("Location: index.php?page=attendeelist&method=getAllAttendees");
        
    }
    
    //Change a role of the choosen attendee by attendee ID
    public function updateAttendeeRole($id)
    {
        
        $idAttendee = $_POST['idAttendee'];
        
        if ($_POST['role'] == 'admin') {
            $role = 1;
        } else if ($_POST['role'] == 'eventManager') {
            $role = 2;
        } else {
            $role = 3;
        }
        
        $stmt = $this->db->prepare("UPDATE `attendee` SET `role`= $role WHERE idattendee = $idAttendee");
        $stmt->execute();
        
        header("Location: index.php?page=attendeelist&method=getAllAttendees");
    }
    
}

?>