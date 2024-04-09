<!-- COLE -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo: Create Account</title>
    <script defer src="../ToDo_JS\login.js"></script>
    <link rel="stylesheet" href="../ToDo_CSS/login.css">
    <link rel="shortcut icon" href="#">
</head>
<!-- DANIEL -->
<?php
    require_once 'db_connection.php';
    require_once 'AccountCheck.php';
    $connection = openConnection();
?>
<body>
    <div id="paper">
        <div id="pattern">
<!-- COLE -->
            <div class="formcontainer">
                <h1 id="title">Create Account</h1>
                <form action="./CreateAccount.php" method="POST" onsubmit="return AccountCreate();">
                    <div class="textfieldUsername">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="typingbox">
                        <div id="UserErrorText" style="display: inline;"><h2></h2></div>
                    </div>

                    <div class="textfieldPassword">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="typingbox">
                        <div id="PassErrorText" style="display: inline;"><h2></h2></div>
                    </div>

                    <div class="textfieldPassword2">
                        <label for="pass2">Re-type Password</label>
                        <input type="password" name="pass2" id="pass2" placeholder="Password" class="typingbox">
                        <div id="Pass2ErrorText" style="display: inline;"><h2></h2></div>
                    </div>

                    <div class="buttons"><button type="submit" id="CreateAccount-button">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>