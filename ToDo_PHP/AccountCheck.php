<?php 
require_once 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];

    $conn = openConnection();

    if (empty($username)) {
        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    if (empty($password)) {
        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    if (empty($password2)) {
        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    if (strlen($username) > 20) {
        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    if (strlen($password) < 6 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $password)) {
        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    if (strlen($password2) < 6 || $password !== $password2) {
        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    $result = userCheck($conn, $username);

    if ($result->num_rows > 0) {

        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    $hashedPassword = hash('sha256', $password);
    $toHash = "DanielPassword";

    echo "<script>";
    echo "var hashResult = " . hash('sha256', $toHash);
    echo "console.log(hashResult);";
    echo "</script>";

    insertToUser($conn, $username, $hashedPassword);

    redirect("http://localhost/ToDo_HTML/ToDO.html");
    
    closeCon($conn);
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