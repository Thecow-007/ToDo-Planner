

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
    

    $result = userCheck($conn, $username);

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
    $toHash = "DanielPassword";

    echo "<script>";
    echo "var hashResult = " . hash('sha256', $toHash);
    echo "console.log(hashResult);";
    echo "</script>";

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


    return $validUsername && $validPassword && $valid2ndPass && $userIsNew;
}
}
?>