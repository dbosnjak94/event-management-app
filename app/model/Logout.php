<?php
class Logout
{
    //logging out the user and unsetting the session variables
    public function logout()
    {  
        session_start();
        session_unset();
        
        if (isset($_COOKIE['currentuser'])) {
            unset($_COOKIE['currentuser']);
            set_cookie('currentuser', null, -1, '/');
            return true;
        } else {
            return false;
        }
        
    }
     
}

?>