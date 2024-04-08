<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo: Create Account</title>
    <script src="../ToDo_JS/login.js"></script>
    <link rel="stylesheet" href="../ToDo_CSS/login.css">
</head>
<?php
    require 'db_connection.php';
    openConnection();
?>
<body>
    <div id="paper">
        <div id="pattern">
            <div class="formcontainer">
                <h1 id="title">Create Account</h1>
                <form action="../ToDo_HTML/ToDo.html" method="POST" onsubmit="return AccountCreate();">

                    <div class="textfieldUsername">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="typingbox">
                        <div id="UserErrorText" style="display: none;"><h2>*User Already Exists.</h2></div>
                    </div>

                    <div class="textfieldPassword">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="typingbox">
                        <div id="PassErrorText" style="display: none;"><h2>*Password Must Contain At Least: 6 Letters, 1 Lowercase Letter, 1 Capital Letter.</h2></div>
                    </div>

                    <div class="textfieldPassword2">
                        <label for="pass2">Re-type Password</label>
                        <input type="password" name="pass2" id="pass2" placeholder="Password" class="typingbox">
                        <div id="Pass2ErrorText" style="display: none;"><h2>*Passwords Do Not Match.</h2></div>
                    </div>

                    <div class="buttons"><button type="submit" id="CreateAccount-button">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>