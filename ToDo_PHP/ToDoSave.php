<?php
    require_once 'db_connection.php';
    require_once 'handyFunctions.php';
    $connection = openConnection();
    $ToDoListJSON = "";

    session_start();

    if (!isset($_SESSION['username'])){
        redirect("http://localhost/akuhsbdoasd");
    }

    //get Username passed from login screen
    $username = $_SESSION['username'];

    //Plan:
    //Take in new ToDoList if exists:
        //Delete all items by user
        //Insert all items by user

    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['ToDoList'])){

        // Retrieve ToDoList JSON string from the POST data
        $ToDoListJSON = $_POST['ToDoList'];

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

        //Delete the user's ToDo items in database
        $removeItemsQ = "DELETE FROM `todo-item` WHERE userID = '" . $userID . "';";
        $delItems = $connection->prepare($removeItemsQ);
        $delItems->execute();

        //Insert all of the new Items
        $addItemsQ = "Insert into `todo-item`(userID, `item-JSON`) Values('" . $userID . "', '" . $ToDoListJSON . "')";
        $addItems = $connection->prepare($addItemsQ);
        $addItems->execute();
    }

?>
<script defer>
    console.log("<?php echo json_decode($ToDoListJSON); ?>");
    // console.log("HELPPPP" + ToDoList);
    printList();
</script>