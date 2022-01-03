<?php
class Session
{
    
    public $id;
    
    //Connecting to a database
    public function __construct()
    {
        $this->db = Database::instance();
    }
    
    //Getting all the sessions connected to one specific event
    public function getAllEventSessions($id)
    {
        $stmt = $this->db->prepare("SELECT * from `session` WHERE session.event = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
        $resultSet = $stmt->fetchAll();
        return $resultSet;
    }
    
    //register user for a specific event based on the event ID user provided
    public function registerUser($id)
    {
        session_start();
        
        $userId = $_SESSION['user_id'];
        
        $stmt = $this->db->prepare("INSERT INTO `attendee_session`(`session`, `attendee`) VALUES ( :id, $userId )");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: index.php?page=attendee&method=getAllData");
    }
    
    //unregister user for a specific event based on the event ID user provided
    public function unRegisterUser($id)
    {
        session_start();
        
        $userId = $_SESSION['user_id'];
        
        $stmt = $this->db->prepare("DELETE FROM `attendee_session` WHERE `attendee_session`.`session` = :id AND `attendee_session`.`attendee` = $userId");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header("Location: index.php?page=attendee&method=getAllData");
    }
    
    
}
?>