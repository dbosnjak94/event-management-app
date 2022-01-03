<?php

class UserRegistration
{
    
    //Connecting to a database
    public function __construct()
    {
        $this->db = Database::instance();
    }
    

    //registrating new unexisting user to the DB
    public function registerNewUser()
    {  
        
        //storing data sent from user
        $newUsername       = $_POST['new_username'];
        $newPassword       = $_POST['new_password'];
        $newPasswordRepeat = $_POST['new_password_repeat'];
        
        //sanitazing the user data from special characters
        $sanitizedNewUsername = filter_var($newUsername, FILTER_SANITIZE_STRING);
        
        //crypting the password before storing it to database
        //Since the password will be crypted, no malicious code can be sent from the side of the user,
        //because that password will still be hashed in the end
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
        session_start();
        session_unset();
        
        $_SESSION["username"] = $newUsername;
        
        if ($newPassword == $newPasswordRepeat) {
            $stmt = $this->db->prepare("INSERT INTO `attendee`(`name`, `password`, `role`) VALUES ('$sanitizedNewUsername','$hashedPassword',3)");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, "UserRegistration");

            //echo "Invalid Login Credentials";
            echo "<script type='text/javascript'>alert('Welcome $newUsername')</script>";
            
            //redirecting the user to the attendee page
            header("Location: index.php?page=attendee&method=getAllData");
            
        } else {
            //echo "Invalid Login Credentials";
            echo "<script type='text/javascript'>alert('Password input was not the same, please return to login page.')</script>";
        }
        
        
    }
}