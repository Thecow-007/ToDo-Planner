<!-- DANIEL & COLE -->
<?php 
    include_once 'db_connection.php';

    // Check request method
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $connection = openConnection();

        $username = $_POST["username"];
        $password = $_POST["pass"];

        $clean_input = true; //If any condition fails, set this to false.

        if(empty($username)){
            //ToDo Javascript function: No Username
            $clean_input = false;
        }

        if(empty($password)){
            //ToDo Javascript function: No password
            $clean_input = false;
        }

        if(strlen($username) > 20){
            //ToDo Javascript function: username too long
            $clean_input = false;
        }
        
        $result = userCheck($connection, $username);
        if ($result->num_rows > 1) {
            //ToDo Javascript function: Too many users with that name!
            $clean_input = false;
        }
        if($result->num_rows == 0){
            //ToDo Javascript function: No account exists with that name!
            $clean_input = false;
        }
        
        if(!$clean_input){
            redirect("http://localhost");
        }

        $hashedPassword = hash('sha256', $password);

        $passResult = passwordCheck($connection, $username,  $hashedPassword);

        if($passResult->num_rows != 1){
            //ToDo JavaScript Function: Incorrect Password
            redirect("http://localhost");
        }

        closeCon($connection);
        redirect("http://localhost/ToDo_HTML/ToDO.html");
    }

    function userCheck($connection, $username){
        $checkExistingUsernames = "SELECT * FROM user WHERE userName = '" . $username . "';";
        $userCheck = $connection->prepare($checkExistingUsernames);
        $userCheck->execute();
        $result = $userCheck->get_result();
        return $result;
    }

    function passwordCheck($connection, $username, $hashedPassword){
        $checkExistingUsernames = "SELECT * FROM user WHERE userName = '" . $username . "' AND userPassword = '" . $hashedPassword . "';";
        $userCheck = $connection->prepare($checkExistingUsernames);
        $userCheck->execute();
        $result = $userCheck->get_result();
        return $result;
    }

    function redirect($url) {
        header('Location: '.$url);
        die();
    }
?>