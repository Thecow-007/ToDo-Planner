<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo: Login</title>
    <script src="./ToDo_JS/login.js"></script>
    <link rel="stylesheet" href="./ToDo_CSS/login.css">
</head>

<?php
    require './ToDo_PHP/db_connection.php';
    openConnection();
?>

<body>
    <div id="paper">
        <div id="pattern">

            <h1 id="title">Login</h1>

            <div class="formcontainer">
                <form action="./ToDo_HTML/ToDo.html" method="post" onsubmit="return AccountLogin();">

                    <div class="textfieldUsername">
                        <label for="username" id="TextUsername">Username</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="typingbox">
                        <div id="UserErrorText" style="display: none;"><h2>*User Does Not Exist.</h2></div>
                    </div>

                    <div class="textfieldPassword">
                        <label for="pass" id="TextPassword">Password</label>
                        <input type="password" name="pass" id="pass" placeholder="Password" class="typingbox">
                        <div id="PassErrorText" style="display: none;"><h2>*Incorrect Password.</h2></div>
                    </div>

                    <div class="buttons">
                        <button type="submit" id="Login-button">Login</button>
                    </div>
                </form>

                <div id="user-box" class="buttons">
                    <a href="./ToDo_PHP/CreateAccount.php"><button id="CreateAccount-button">Create New Account</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>