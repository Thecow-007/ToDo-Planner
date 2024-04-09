

<?php 

require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];

    
function thePHP() {
    logTest();

$conn = openConnection();

    if (strlen($username) <= 20 && !empty($username)) {
        $validUsername = true;
        echo '<script>';
        echo 'validUsername();';
        echo '</script>';
        
    }
            if (empty($username)) {
            $validUsername = false;
            echo '<script>';
            echo 'mustIncludeUsername();';
            echo '</script>';
            exit;
        }
            if (strlen($username) > 20) {
            $validUsername = false;
            echo '<script>';
            echo 'userMustBeLessThan20char();';
            echo '</script>';
            exit;
        }


    if (strlen($password) > 6 && !empty($password) && preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $password)) {
        $validPassword = true;
        echo '<script>';
        echo 'validPassword();';
        echo '</script>';
    } 

            if (strlen($password) < 6 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z]).{6,}$/', $password)) {
            $validPassword = false;
            echo '<script>';
            echo 'passMustInclude();';
            echo '</script>';
            exit;
        }
    

    if (strlen($password2) > 6 && $password == $password2) {
        $valid2ndPass = true;
        echo '<script>';
        echo 'valid2ndPass();';
        echo '</script>';
    }
            if (empty($password2)) {
            $valid2ndPass = false;
            echo '<script>';
            echo 'mustRepeatPassword();';
            echo '</script>';
            exit;
        }
            if (strlen($password2) < 6 || $password !== $password2) {
            $valid2ndPass = false;
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
        $userIsNew = false;
        echo '<script>';
        echo 'userAlreadyExists();';
        echo '</script>';
        exit;
    } else {
        $userIsNew = true;
    }

    $hashedPassword = hash('sha256', $password);

    $insertToUser = "INSERT INTO user (userName, userPassword) VALUES (:userName, :passWord)";
    $userCheck = $connection->prepare($insertToUser);
    $userCheck->bind_param(":userName", $username);
    $userCheck->bind_param(":passWord", $hashedPassword);

    closeCon();

    return $validUsername && $validPassword && $valid2ndPass && $userIsNew;
}
}
?>