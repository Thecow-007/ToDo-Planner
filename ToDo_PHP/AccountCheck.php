<?php 
require_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];

    $conn = openConnection();

    $cleanInput = true;

    if (empty($username)) {
        $cleanInput = false;
    }

    if (empty($password)) {
        $cleanInput = false;
    }

    if (empty($password2)) {
        $cleanInput = false;
    }

    if (strlen($username) > 20) {
        $cleanInput = false;
    }

    if (strlen($password) < 6 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $password)) {
        $cleanInput = false;
    }

    if (strlen($password2) < 6 || $password !== $password2) {
        $cleanInput = false;
    }

    if(!$cleanInput){ /if unclean output, send them back to creat account page
        redirect("http://localhost/ToDo_PHP/CreateAccount.php");
    }

    $result = userCheck($conn, $username);

    if ($result->num_rows > 0) {

        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    $hashedPassword = hash('sha256', $password);

    insertToUser($conn, $username, $hashedPassword);

    closeCon($conn);
    redirect("http://localhost/ToDo_HTML/ToDO.html");
}

function userCheck($connection, $username){
    $checkExistingUsernames = "SELECT * FROM user WHERE userName = '" . $username . "';";
    $userCheck = $connection->prepare($checkExistingUsernames);
    $userCheck->execute();
    $result = $userCheck->get_result();
    return $result;
}

function insertToUser($connection, $username, $hashedPassword){
    $insertToUser = "INSERT INTO user (userName, userPassword) VALUES ('" . $username . "', '" . $hashedPassword . "');";
    $userCheck = $connection->query($insertToUser);
    echo "Inserting User...";   
    // $userCheck->execute();
}

function redirect($url) {
    header('Location: '.$url);
    die();
}

?>