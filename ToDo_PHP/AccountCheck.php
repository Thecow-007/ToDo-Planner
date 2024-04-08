<?php 
require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];

    if (empty($username)) {
        echo '<script>';
        echo 'mustIncludeUsername();';
        echo '</script>';
        exit;
    }

    if (empty($password)) {
        echo '<script>';
        echo 'mustIncludePassword();';
        echo '</script>';
        exit;
    }

    if (empty($password2)) {
        echo '<script>';
        echo 'mustRepeatPassword();';
        echo '</script>';
        exit;
    }

    if (strlen($username) > 20) {
        echo '<script>';
        echo 'userMustBeLessThan20char();';
        echo '</script>';
        exit;
    }

    if (strlen($password) < 6 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $password)) {
        echo '<script>';
        echo 'passMustInclude();';
        echo '</script>';
        exit;
    }

    if (strlen($password2) < 6 || $password !== $password2) {
        echo '<script>';
        echo 'passDoNotMatch();';
        echo '</script>';
        exit;
    }

    $checkExistingUsernames = "SELECT * FROM user WHERE userName = :userName";
    $userCheck = $connection->prepare($checkExistingUsernames);
    $userCheck->bind_param(":userName", $username);
    $userCheck->execute();
    $result = $userCheck->get_result();

    if ($result->num_rows > 0) {

        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    }

    $hashedPassword = hash('sha256', $password);

    $insertToUser = "INSERT INTO user (userName, userPassword) VALUES (:userName, :passWord)";
    $userCheck = $connection->prepare($insertToUser);
    $userCheck->bind_param(":userName", $username);
    $userCheck->bind_param(":pasWord", $hashedPassword);
    
    closeCon();
}

?>