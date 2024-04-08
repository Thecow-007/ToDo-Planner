<?php 
    include 'db_connection.php';

    // Check request method
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $connection = openConnection();

        $username = $_POST["username"];
        $password = $_POST["pass"];

        if(empty($username)){
            //ToDo Javascript function: No Username
        }

        if(empty($password)){
            //ToDo Javascript function: No password
        }

        if(strlen($username) > 20){
            //ToDo Javascript function: username too long
        }
        
        $result = userCheck($connection, $username);
        if ($result->num_rows > 1) {
            //ToDo Javascript function: Too many users with that name!
        }
        if($result->num_rows = 0){
            //ToDo Javascript function: No account exists with that name!
        }

        $hashedPassword = hash('sha256', $password);

        $passResult = passwordCheck($connection, $username,  $hashedPassword);

        if($passResult->num_rows == 1){

        }

    }

    function userCheck($connection, $username){
        $checkExistingUsernames = "SELECT * FROM user WHERE userName = :userName";
        $userCheck = $connection->prepare($checkExistingUsernames);
        $userCheck->bind_param(":userName", $username);
        $userCheck->execute();
        $result = $userCheck->get_result();
        return $result;
    }

    function passwordCheck($connection, $hashedPassword){
        $checkExistingUsernames = "SELECT * FROM user WHERE userName = :userName AND userPassword = :password";
        $userCheck = $connection->prepare($checkExistingUsernames);
        $userCheck->bind_param(":userName", $username);
        $userCheck->bind_param(":pasWord", $hashedPassword);
        $userCheck->execute();
        $result = $userCheck->get_result();
        return $result;
    }
?>