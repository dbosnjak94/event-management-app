<?php
class Authenlogin
{
    
    public function login()
    {
        //connecting to database
        $connection = mysqli_connect('localhost', 'root', 'mysql');
        if (!$connection) {
            die("Database Connection Failed" . mysqli_error($connection));
        }
        $select_db = mysqli_select_db($connection, 'dxb3501');
        if (!$select_db) {
            die("Database Selection Failed" . mysqli_error($connection));
        }
        

        if (isset($_POST['user_id']) and isset($_POST['user_pass'])) {
            
            // Assigning POST values to variables.
            $username = $_POST['user_id'];
            $password = $_POST['user_pass'];
            
            //sanitizing username and password input from user
            $sanitizedNewUsername = filter_var($username, FILTER_SANITIZE_STRING);
            $sanitizedNewUsername = filter_var($sanitizedNewUsername, FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_var($password, FILTER_SANITIZE_STRING);

            //initializing session variable that will indicate if user is logged in or not
            $_SESSION['logged_in'] = false;
            
            // Checking for the record form the table 
            $query = "SELECT * FROM `attendee` WHERE name='$sanitizedNewUsername'";
            
            //using the connection to the databse and query to get the data from DB
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            $count = mysqli_num_rows($result);
            
            //storing associative array data into variable
            $row = $result->fetch_assoc();
            
            //getting specific info about the user that logged in
            $userId   = $row['idattendee'];
            $userName = $row['name'];
            $userRole = $row['role'];
            
            //getting the password from the database and verifying by unhashing it
            $userPass = $row['password'];
            $passIsVerified = password_verify($password, $userPass);
            

            //checks if username and password have been verified $passIsVerified == 1, if it has find any data in the database about the user $count == 1
            //in the end it checks the user role in order to be able to redirect user defined by his premissions
            if ($count == 1 && $passIsVerified == 1 && $userRole == 1) {
                
                //starting a session                
                session_start();
                
                //storing the data about the user in global $_SESSION variable
                $_SESSION["logged_in"] = true;
                $_SESSION["username"]  = $userName;
                $_SESSION["role"]      = $userRole;
                
                $value  = time();
                $expire = time() + 60 * 10;
                
                //Setting a new cookie with the user name stored 
                setcookie("currentuser", $userName, time() + 60 * 60 * 24 * 365, '/');
                
                //moving user to a new destination depending on a role
                header("Location: index.php?page=admin&method=getAllData");
                
            } else if ($count == 1 && $passIsVerified == 1 && $userRole == 2) {
                
                //echo "Login Credentials verified";
                echo "<script type='text/javascript'>alert('Login Credentials verified') </script>";
                
                session_start();
                
                //storing the data about the user in global session variable
                $_SESSION["logged_in"] = true;
                $_SESSION["username"]  = $userName;
                $_SESSION["role"]      = $userRole;
                $_SESSION["user_id"]   = $userId;
                
                $value  = time();
                $expire = time() + 60 * 10;
                
                setcookie("currentuser", $userName, time() + 60 * 60 * 24 * 365, '/');
                
                //moving user to a new destination
                header("Location: index.php?page=eventmanager&method=getAllData");
                
            } else if ($count == 1 && $passIsVerified == 1 && $userRole == 3) {
                
                session_start();
                
                //storing the data about the user in global session variable
                $_SESSION["logged_in"] = true;
                $_SESSION["username"]  = $userName;
                $_SESSION["role"]      = $userRole;
                $_SESSION["user_id"]   = $userId;
                
                $value  = time();
                $expire = time() + 60 * 10;
                
                setcookie("currentuser", $userName, time() + 60 * 60 * 24 * 365, '/');
                
                //moving user to a new destination
                header("Location: index.php?page=attendee&method=getAllData");
                
            } else {
                
                //echo "Invalid Login Credentials";
                echo "<script type='text/javascript'>alert('Invalid Login Credentials, please try again!')</script>";
                
                //header("Location: index.php?page=login&method=null");
                
            }
            
        }
    }
    
}
?>