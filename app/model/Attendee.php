<?php
class Attendee
{
    
    public $id;
    
    //Connecting to a database
    public function __construct()
    {
        $this->db = Database::instance();
    }
    
    //getting data about all events
    public function getAllData()
    {
        $stmt = $this->db->prepare("SELECT * FROM `event`");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Attendee");
        return $stmt->fetchAll();
    }
    
    //getting all sessions connected to specific event based on event event ID
    public function getAllEventSessions($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM `session` WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Attendee");
        $resultSet = $stmt->fetchAll();
        return $resultSet;
    }
    
    
}
?>