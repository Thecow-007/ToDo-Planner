<?php
    function openConnection(){
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = null;
        $dbName = "todo_planner";
        $port = 5505;
        $connection = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName, $port)or die("Connect failed: %s\n". $connECTION -> error);
        return $connection;
    }
    
    function CloseCon($conn){
        $conn -> close();
    }
?>