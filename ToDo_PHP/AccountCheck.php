<?php 
require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];

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

    $checkExistingUsernames = "SELECT * FROM user WHERE userName = ?";
    $userCheck = $connection->prepare($checkExistingUsernames);
    $userCheck->bind_param("s", $username);
    $userCheck->execute();
    $result = $userCheck->get_result();

    if ($result->num_rows > 0) {

        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    $hashedPassword = hash('sha256', $password);

    $insertToUser = "INSERT INTO user (userName, userPassword) VALUES (?, ?)";
    $userCheck = $connection->prepare($insertToUser);
    $userCheck->bind_param("ss", $username, $hashedPassword);
    $connection->close();
    
}

?>