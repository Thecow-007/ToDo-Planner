<!-- COLE & DANIEL -->
<?php
    function openConnection(){
        $servername = "localhost";
        $dbUsername = "ToDoUser";
        $dbPassword = "ToDoPassword";
        $dbName = "todo_planner";
        $port = 5505;
        $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName, $port)or die("Connect failed: %s\n". $connection -> error);
        return $connection;
    }
    
    function closeCon($conn){
        $conn -> close();
    }
?>