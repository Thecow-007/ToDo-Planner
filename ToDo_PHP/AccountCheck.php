

<?php 
require_once 'db_connection.php';
require_once 'handyFunctions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];


    $conn = openConnection();
    session_start();

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

    if(!$cleanInput){ //if unclean output, send them back to creat account page
        redirect("http://localhost/ToDo_PHP/CreateAccount.php");
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

    insertToUser($conn, $username, $hashedPassword);
    //collect todo items from db
    $userIDQ = "SELECT UserID FROM User WHERE Username = '" . $username . "'";
    $userIDexec = $connection->prepare($userIDQ);
    $userIDexec->execute();
    $userIDResult = $userIDexec->get_result();
    $userID = "";
    $row = $userIDResult->fetch_assoc();
    // Check if a row was found
    if ($row) {
        // Access the UserID value
        $userID = $row['UserID'];
    } else {
        redirect("http://localhost");
    }

    // Close statement
    $userIDexec->close();

    $todoItemQ = "Select `item-JSON` FROM `todo-item` WHERE userID = '" . $userID . "';";
    $todoItemExec = $conn->prepare($todoItemQ);
    $todoItemExec->execute();
    $todoItemResult = $todoItemExec->get_result();
    $todoItem = "";
    $row = $todoItemResult->fetch_assoc();
    // Check if a row was found
    if ($row) {
        // Access the UserID value
        $todoItem = $row['item-JSON'];
    } else {
        $todoItem = "[]";
    }
    // Close statement
    $todoItemExec->close();

    closeCon($conn);
    $_SESSION['username'] = $username;
    $_SESSION['todo-item'] = $todoItem;
    redirect("http://localhost/ToDo_PHP/ToDo.php");
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
    $userCheck = $connection->prepare($insertToUser);  
    $userCheck->execute();
}
?>